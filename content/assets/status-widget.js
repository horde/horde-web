/**
 * status-widget.js - live StatusCake status badge for www.horde.org
 *
 * Copyright 2013-2026 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * Renders the "All Systems Up" / "X is down" footer badge from the
 * public StatusCake report for status.horde.org. This is a genuinely
 * live/request-time concern (build-time pregeneration can't know the
 * current uptime state), so it stays client-side JS layered on top of
 * the otherwise fully static page - see the pregeneration plan's
 * "static vs. live-rendered" catalog.
 *
 * StatusCake's public report endpoint only supports JSONP (no CORS
 * headers on the plain-JSON endpoint), so a <script> tag injection is
 * used rather than fetch(). No external library (e.g. jQuery) is
 * required.
 */
(function () {
  "use strict";

  var PUBLIC_ID = "jiTk8BseRI";
  var ENDPOINT = "https://app.statuscake.com/Workfloor/PublicReportHandler.php";
  var CALLBACK_NAME = "__hordeStatusCallback";
  var TIMEOUT_MS = 8000;

  function byId(id) {
    return document.getElementById(id);
  }

  function render(container, state, detail) {
    if (!container) {
      return;
    }
    container.classList.remove("status-checking", "status-up", "status-down");
    container.classList.add("status-" + state);

    var label;
    if (state === "up") {
      label = "All systems up";
    } else if (state === "down") {
      label = detail ? detail + " is down" : "Service disruption";
    } else if (state === "unavailable") {
      label = "Status unavailable";
    } else {
      label = "Checking status\u2026";
    }
    container.textContent = "";
    var dot = document.createElement("span");
    dot.className = "status-dot";
    dot.setAttribute("aria-hidden", "true");
    var text = document.createElement("span");
    text.className = "status-text";
    text.textContent = label;
    container.appendChild(dot);
    container.appendChild(text);
  }

  function cleanup(script, timer) {
    if (timer) {
      clearTimeout(timer);
    }
    if (script && script.parentNode) {
      script.parentNode.removeChild(script);
    }
    try {
      delete window[CALLBACK_NAME];
    } catch (e) {
      window[CALLBACK_NAME] = undefined;
    }
  }

  function init() {
    var container = byId("horde-status-widget");
    if (!container) {
      return;
    }

    render(container, "checking");

    var script = document.createElement("script");
    var timer = window.setTimeout(function () {
      render(container, "unavailable");
      cleanup(script, null);
    }, TIMEOUT_MS);

    window[CALLBACK_NAME] = function (data) {
      cleanup(script, timer);

      if (!data || !data.TestData || !data.TestData.length) {
        render(container, "unavailable");
        return;
      }

      var down = null;
      for (var i = 0; i < data.TestData.length; i++) {
        var test = data.TestData[i];
        if (test && test.Status !== "Up") {
          down = test.Name || "A service";
          break;
        }
      }

      if (down) {
        render(container, "down", down);
      } else {
        render(container, "up");
      }
    };

    script.src =
      ENDPOINT + "?PublicID=" + encodeURIComponent(PUBLIC_ID) + "&callback=" + CALLBACK_NAME;
    script.async = true;
    script.onerror = function () {
      render(container, "unavailable");
      cleanup(script, timer);
    };
    document.head.appendChild(script);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
