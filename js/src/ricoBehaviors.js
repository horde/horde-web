/**
  *  (c) 2005-2007 Richard Cowin (http://openrico.org)
  *
  *  Rico is licensed under the Apache License, Version 2.0 (the "License"); you may not use this
  *  file except in compliance with the License. You may obtain a copy of the License at
  *   http://www.apache.org/licenses/LICENSE-2.0
  **/

/** @ignore */
Rico.selectionSet = function(set, options){
  new Rico.SelectionSet(set, options);
};

Rico.SelectionSet = Class.create(
/** @lends Rico.SelectionSet# */
{
/**
 * @class
 * @constructs
 * @param selectionSet collection of DOM elements (or a CSS selection string)
 * @param options object may contain any of the following:<dl>
 *   <dt>selectedClass</dt><dd>class name to add when element is selected, default is "selected"</dd>
 *   <dt>selectNode   </dt><dd>optional function that returns the element to be selected</dd>
 *   <dt>onSelect     </dt><dd>optional function that gets called when element is selected</dd>
 *   <dt>onFirstSelect</dt><dd>optional function that gets called the first time element is selected</dd>
 *   <dt>noDefault    </dt><dd>when true, no element in the set is initially selected, default is false</dd>
 *   <dt>selectedIndex</dt><dd>index of the element that should be initially selected, default is 0</dd>
 *   <dt>cookieName   </dt><dd>optional name of cookie to use to remember selected element. If specified, and the cookie exists, then the cookie value overrides selectedIndex.</dd>
 *   <dt>cookieDays   </dt><dd>specifies how long cookie should persist (in days). If unspecified, then the cookie persists for the current session.</dd>
 *   <dt>cookiePath   </dt><dd>optional cookie path</dd>
 *   <dt>cookieDomain </dt><dd>optional cookie domain</dd>
 *</dl>
 */
	initialize: function(selectionSet, options){
		this.options = options || {};
    if (typeof selectionSet == 'string')
      selectionSet = $$(selectionSet);
	  this.previouslySelected = [];
		this.selectionSet = selectionSet;
		this.selectedClassName = this.options.selectedClass || "selected";
		this.selectNode = this.options.selectNode || function(e){return e;};
		this.onSelect = this.options.onSelect;
    this.onFirstSelect = this.options.onFirstSelect;
		this.clickHandler = this.click.bind(this);
		selectionSet.each(function(e) {Event.observe(e, "click", new Rico.EventWrapper(this.clickHandler,e).wrapper);}.bind(this));
    if (!this.options.noDefault) {
		  var cookieIndex=this.options.cookieName ? this.getCookie() : 0;
      this.selectIndex(cookieIndex || this.options.selectedIndex || 0);
    }
	},
  getCookie: function() {
    var cookie = RicoUtil.getCookie(this.options.cookieName);
    if (!cookie) return 0;
    var index = parseInt(cookie);
    return index < this.selectionSet.length ? index : 0;
	},
	reset: function(){
	  this.previouslySelected = [];
	  this.notifySelected(this.selected);
	},
	select: function(element){
		if (this.selected == element)
			return;

		if (this.selected)
		  Element.removeClassName(this.selectNode(this.selected), this.selectedClassName);

    this.notifySelected(element);

		this.selected = element;
    Element.addClassName(this.selectNode(this.selected), this.selectedClassName);
	},
	notifySelected: function(element){
    var index = this.selectionSet.indexOf(element);
		if (this.options.cookieName)
      RicoUtil.setCookie(this.options.cookieName, index, this.options.cookieDays, this.options.cookiePath, this.options.cookieDomain);
    if (this.onFirstSelect && !this.previouslySelected[index]){
      this.onFirstSelect(element, index);
      this.previouslySelected[index] = true;
    }
  	if (this.onSelect)
      try{
  	    this.onSelect(element, index);
      } catch (e) {};
	},
	selectIndex: function(index){
		this.select(this.selectionSet[index]);
	},
	nextSelectItem: function(){
    var index = this.selectionSet.indexOf(this.selected);
    if (index + 1 >= this.selectionSet.length)
      return this.selectionSet[index - 1];
    else
      return this.selectionSet[index + 1];
	},
	selectNext: function(){
    var index = this.selectionSet.indexOf(this.selected);
    if (index >= this.selectionSet.length)
      this.selectIndex(index - 1);
    else
      this.selectIndex(index + 1);
	},
	click: function(event,target) {
		this.select(target);
	},
	add: function(item){
	//	this.selectionSet.push(item)
	  if (item.constructur == Array) {
	    item.each(function(e){
	      	Event.observe(e, "click", new Rico.EventWrapper(this.clickHandler,item).wrapper);
	    }.bind(this));
	  } else {
		  Event.observe(item, "click", new Rico.EventWrapper(this.clickHandler,item).wrapper);
    }
	},
	remove: function(item){
	  this.selectionSet = this.selectionSet.without(item);
			//Todo: need to cleanup all events on item - need to keep track of eventwrappers
	},
	removeAll: function(){
	}
 });

Rico.HoverSet = Class.create(
/** @lends Rico.HoverSet# */
{
/**
 * @class
 * @constructs
 * @param hoverSet collection of DOM elements
 * @param options object may contain any of the following:<dl>
 *   <dt>hoverClass</dt><dd> class name to add when mouse is over element, default is "hover"</dd>
 *   <dt>hoverNodes</dt><dd> optional function to select/filter which nodes are in the set</dd>
 *</dl>
 */
  initialize: function(hoverSet, options){
    options = options || [];
    this.hoverSet = hoverSet;
    this.hoverClassName = options.hoverClass || "hover";
    this.hoverNodes = options.hoverNodes || function(e){return [e];};
    this.listenerHover    = this._onHover.bind(this);
    this.listenerEndHover = this._onUnHover.bind(this);
    for (var i=0; i<this.hoverSet.length; i++) this.add(this.hoverSet[i]);
  },
  _onHover: function(event,target) {
    this.hover(target);
  },
  _onUnHover: function(event,target) {
    this.unHover(target);
  },
  hover: function(target) {
    this.hoverNodes(target).each((function(t){Element.addClassName(t,this.hoverClassName);}).bind(this));
  },
  unHover: function(target) {
    this.hoverNodes(target).each((function(t){Element.removeClassName(t,this.hoverClassName);}).bind(this));
  },
  add: function(item){
    Event.observe(item, "mousemove", new Rico.EventWrapper(this.listenerHover,item).wrapper);
    Event.observe(item, "mouseout", new Rico.EventWrapper(this.listenerEndHover,item).wrapper);
  }
});


/**
 * @namespace
 */
Rico.Hover = {
  groups: {},
  clearCurrent: function(group) {
    var last_hover = Rico.Hover.groups[group];
    if(!last_hover) return;
    clearTimeout(last_hover[0]);
    last_hover[1].end();
    Rico.Hover.groups[group] = null;
  },
  end: function(group) {
  	Rico.Hover.groups[group][1].end();
  },
  endWith: function(hover, group) {
  	var timer = setTimeout('Rico.Hover.end("'+ group + '")', hover.exitDelay);
    Rico.Hover.groups[group] = [timer, hover];
  }
};

Rico.HoverDisplay = Class.create(
/** @lends Rico.HoverDisplay# */
{
/**
 * @class
 * @constructs
 * @param element
 * @param options object may contain any of the following:<dl>
 *   <dt>group</dt><dd> </dd>
 *   <dt>delay</dt><dd> </dd>
 *</dl>
 */
  initialize: function(element, options) {
  	this.element = element;
  	this.options = options || {};
  	this.group = this.options.group;
  	this.exitDelay = this.options.delay || 1000;
  },
  begin: function() {
    Rico.Hover.clearCurrent(this.group);
		Element.show(this.element);
  },
  end: function(delay) {
    if(delay)
      Rico.Hover.endWith(this, this.group);
    else
		  Element.hide(this.element);
  }
});


Rico.EventWrapper = Class.create(
/** @lends Rico.EventWrapper# */
{
/**
 * @class
 * @constructs
 * @param handler
 * @param target
 */
  initialize: function(handler, target){
    this.handler = handler;
    this.target = target;
    this.wrapper = this.wrapperCall.bindAsEventListener(this);
  },
  wrapperCall: function(event){
    this.handler(event, this.target);
  }
});

Rico.includeLoaded('ricoBehaviors.js');
