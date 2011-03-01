<h3>What is Jeta?</h3>

<p>Jeta is a Java based Horde module to provide SSH login access to a
web server, or to another machine if used in conjunction with some
relaying software which can be installed on the web server.</p>

<p>Today it is recommended to use secure communications on public
networks (i.e. the Internet). The secure shell (SSH) provides
such secure communications, but it requires special software on
the machines you are using. To avoid this requirement on the
clienit machine, Jeta provides a Java based SSH application that can
be accessed with any web browser which supports Java.
This provides an easy to use but secure way to
log into your web server with a very nice
terminal emulator, all right from your web browser.</p>

<blockquote>
  <p>Important Security Note: The applet
  is suspectible to the man-in-the-middle attacks. We cannot
  avoid this. We can't even use the RSA based host authorization
  since the applet itself is downloaded from a remote host and
  might be modified by the man-in-the-middle. The only way to
  guard against applet modification would be having it signed
  with a trust certificate, but this is too expensive (in time,
  money, and development costs) to be practical. To summarize,
  this applet provides good security through encryption to
  prevent normal packet sniffing, which prevents the most common
  and easiest security attacks, but cannot prevent more complex
  security attacks like man-in-the-middle attacks.</p>

  <p><span class="rednote">Note:</span> This version should run
  with all runtime environments that are at least Java 1.1.x
  compatible. If you are working with an older Java runtime
  environment (e.g. 1.0) please upgrade to a newer version.</p>
</blockquote>

<h3>What does it require?</h3>
<p>Jeta requires a web server running Horde and a web browser with support for
at least Java 1.1.
