/** 
 *  SVGPan library 1.2.2
 * ======================
 *
 * Given an unique existing element with id "viewport" (or when missing, the 
 * first g-element), including the the library into any SVG adds the following 
 * capabilities:
 *
 *  - Mouse panning
 *  - Mouse zooming (using the wheel)
 *  - Object dragging
 *
 * You can configure the behaviour of the pan/zoom/drag with the variables
 * listed in the CONFIGURATION section of this file.
 *
 * Known issues:
 *
 *  - Zooming (while panning) on Safari has still some issues
 *
 * Releases:
 *
 * 1.2.2, Tue Aug 30 17:21:56 CEST 2011, Andrea Leofreddi
 *	- Fixed viewBox on root tag (#7)
 *	- Improved zoom speed (#2)
 *
 * 1.2.1, Mon Jul  4 00:33:18 CEST 2011, Andrea Leofreddi
 *	- Fixed a regression with mouse wheel (now working on Firefox 5)
 *	- Working with viewBox attribute (#4)
 *	- Added "use strict;" and fixed resulting warnings (#5)
 *	- Added configuration variables, dragging is disabled by default (#3)
 *
 * 1.2, Sat Mar 20 08:42:50 GMT 2010, Zeng Xiaohui
 *	Fixed a bug with browser mouse handler interaction
 *
 * 1.1, Wed Feb  3 17:39:33 GMT 2010, Zeng Xiaohui
 *	Updated the zoom code to support the mouse wheel on Safari/Chrome
 *
 * 1.0, Andrea Leofreddi
 *	First release
 *
 * This code is licensed under the following BSD license:
 *
 * Copyright 2009-2010 Andrea Leofreddi <a.leofreddi@itcharm.com>. All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 * 
 *    1. Redistributions of source code must retain the above copyright notice, this list of
 *       conditions and the following disclaimer.
 * 
 *    2. Redistributions in binary form must reproduce the above copyright notice, this list
 *       of conditions and the following disclaimer in the documentation and/or other materials
 *       provided with the distribution.
 * 
 * THIS SOFTWARE IS PROVIDED BY Andrea Leofreddi ``AS IS'' AND ANY EXPRESS OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND
 * FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL Andrea Leofreddi OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * The views and conclusions contained in the software and documentation are those of the
 * authors and should not be interpreted as representing official policies, either expressed
 * or implied, of Andrea Leofreddi.
 */"use strict";function setupHandlers(e){setAttributes(e,{onmouseup:"handleMouseUp(evt)",onmousedown:"handleMouseDown(evt)",onmousemove:"handleMouseMove(evt)"});navigator.userAgent.toLowerCase().indexOf("webkit")>=0?e.addEventListener("mousewheel",handleMouseWheel,!1):e.addEventListener("DOMMouseScroll",handleMouseWheel,!1)}function clearHandlers(e){e.onmouseup=null;e.onmousedown=null;e.onmousemove=null;navigator.userAgent.toLowerCase().indexOf("webkit")>=0?e.removeEventListener("mousewheel",handleMouseWheel,!1):e.removeEventListener("DOMMouseScroll",handleMouseWheel,!1)}function getRoot(e){if(svgRoot==null){var t=e.getElementById("viewport")?e.getElementById("viewport"):e.documentElement,n=t;while(n!=e){if(n.getAttribute("viewBox")){setCTM(t,t.getCTM());n.removeAttribute("viewBox")}n=n.parentNode}svgRoot=t}return svgRoot}function getEventPoint(e){var t=root.createSVGPoint();t.x=e.clientX;t.y=e.clientY;return t}function setCTM(e,t){var n="matrix("+Math.max(1,t.a)+","+t.b+","+t.c+","+Math.max(1,t.d)+","+Math.min(0,t.e)+","+Math.min(0,t.f)+")";e.setAttribute("transform",n)}function dumpMatrix(e){var t="[ "+e.a+", "+e.c+", "+e.e+"\n  "+e.b+", "+e.d+", "+e.f+"\n  0, 0, 1 ]";return t}function setAttributes(e,t){for(var n in t)e.setAttributeNS(null,n,t[n])}function handleMouseWheel(e){if(!enableZoom)return;e.preventDefault&&e.preventDefault();e.returnValue=!1;var t=e.target.ownerDocument,n;e.wheelDelta?n=e.wheelDelta/360:n=e.detail/-9;console.log(n);var r=Math.pow(1+zoomScale,n),i=getRoot(t),s=getEventPoint(e);s=s.matrixTransform(i.getCTM().inverse());var o=root.createSVGMatrix().translate(s.x,s.y).scale(r).translate(-s.x,-s.y);console.log(o);setCTM(i,i.getCTM().multiply(o));typeof stateTf=="undefined"&&(stateTf=i.getCTM().inverse());stateTf=stateTf.multiply(o.inverse())}function handleMouseMove(e){e.preventDefault&&e.preventDefault();e.returnValue=!1;var t=e.target.ownerDocument,n=getRoot(t);if(state=="pan"&&enablePan){var r=getEventPoint(e).matrixTransform(stateTf);setCTM(n,stateTf.inverse().translate(r.x-stateOrigin.x,r.y-stateOrigin.y))}else if(state=="drag"&&enableDrag){var r=getEventPoint(e).matrixTransform(n.getCTM().inverse());setCTM(stateTarget,root.createSVGMatrix().translate(r.x-stateOrigin.x,r.y-stateOrigin.y).multiply(n.getCTM().inverse()).multiply(stateTarget.getCTM()));stateOrigin=r}}function handleMouseDown(e){console.log("mousedown");e.preventDefault&&e.preventDefault();e.returnValue=!1;var t=e.target.ownerDocument,n=getRoot(t);if(e.target.tagName=="svg"||!enableDrag){state="pan";stateTf=n.getCTM().inverse();stateOrigin=getEventPoint(e).matrixTransform(stateTf)}else{state="drag";stateTarget=e.target;stateTf=n.getCTM().inverse();stateOrigin=getEventPoint(e).matrixTransform(stateTf)}}function handleMouseUp(e){console.log("mouseup");e.preventDefault&&e.preventDefault();e.returnValue=!1;var t=e.target.ownerDocument;if(state=="pan"||state=="drag")state=""}var enablePan=1,enableZoom=1,enableDrag=0,zoomScale=.2,root=document.getElementById("svgCanvas"),state="none",svgRoot=null,stateTarget,stateOrigin,stateTf;