/*
Presentacular. v 0.1
http://labs.cavorite.com/presentacular/
(c) 2005, Juan Manuel Caicedo

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

See http://www.gnu.org/copyleft/gpl.html for more information

*/

/*
Creates a chain function. 

Todo: 
	Handle return values
	Add a chained property with a reference to the original function

Static method
*/
Function.chain = function(from,ext){
	return function() {
		from.apply(this,arguments)
		ext.apply(this,arguments)
	}
}

/*
Creates a chained function
Instance method
*/
Function.prototype.chain = function(){
	var __source = this
	var exts = arguments
	return function(){
		__source.apply(this,arguments)
		for (e = 0; e < exts.length; e++){
			exts[e].apply(this,arguments)
		}
	}
}

/*
Applies function f to each element of the list
*/
function Map(list,f){
	var r = []
	for (var i=0; i < list.length; i++){
		r.push(f.call(this,list[i]))
	}
	return r
}



var Presentacular = {}

/*
Available effects
TODO: Provide a function to add effects
*/
Presentacular.effects = {
	blinddown: Effect.BlindDown,
	appear: Effect.Appear,
	puff: Effect.Puff,
	shake: Effect.Shake,
	pulsate: Effect.Pulsate,
	slidedown: Effect.SlideDown,
	highlight: Effect.Highlight,
	grow: Effect.Grow,
	fade: Effect.Fade,
	fold: Effect.Fold,
	shrink: Effect.Shrink
}

/*
Apply effects to element elm.

parentClasses: If true, include effects defined in the parent element. Used for lists (ul, ol)

*/
Presentacular.applyEffects = function(elm,parentClasses){
	
	var c = []
	if (parentClasses)
		c = c.concat(elm.parentNode.className.split(' '))
		c = c.concat(elm.className.split(' '))
		Map(c, function(cl){
		if (!cl) return


		//Proof of concept. this code could (and should) be more elegant
		cl = cl.toLowerCase().split('_')
		
		var opts = {duration: 1}
		if (cl.length > 1){
			opts.duration = cl[1]
		}

		if (Presentacular.effects[cl[0]]){
			Presentacular.effects[cl[0]].call(this,elm,opts)
		}
		return
	})
}


/*
Chained function
*/
function ChangeSlide(step){

	var ce = $('slide' + snum)
	
	//Apply slide effects
	Presentacular.applyEffects(ce)

	//Apply effects to all elements but the incrementals
	Map(ce.getElementsByTagName('*'), function(elm){
		if (!hasClass(elm,"incremental")){
			Presentacular.applyEffects(elm)
		}
	})
}


/*
Chained function
*/
function ApplyCurrentElement(elm,className){
	if (className == "current"){
		Presentacular.applyEffects(elm,true)
	}
}

/*
Function chaining: execute the second function after the first one has finished

This was necesary in order to keep the same function names and because I want
to *extend* S5 instead of *edit* it.

*/
window.addClass = addClass.chain(ApplyCurrentElement)
window.go = go.chain(ChangeSlide)
