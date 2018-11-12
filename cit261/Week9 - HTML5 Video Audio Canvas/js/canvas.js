window.onload = function(){
    var canvas = document.getElementsByTagName("canvas")[0];

    var ctx = setupCanvas(canvas);

    //Line
    ctx.moveTo(0,0); //Move the starting point of a new sub-path to the the x and y parameters (coordinates).
    ctx.lineTo(288, 150); //create a line from the last point (0,0) to the x and y paramenter (coordinates).
    ctx.stroke();

    //Circle
    ctx.beginPath(); //start a new path, not conitnue from the last one.
    ctx.arc(288,150,120,1.5,3 * Math.PI, true); //x, y, radius, startAngle, endAngle, [boolean anticlockiwise];
    ctx.stroke();

    //Stroke Text
    ctx.font = "40px Arial";
    ctx.strokeStyle="#5F9EA0";
    ctx.strokeText("Hi my friend!", 288, 150); //(text, x, y, [,maxWidth])
    //https://www.w3schools.com/tags/canvas_strokestyle.asp
    
    /*
    If I used the 
        ctx.fillText('Hi my friend!', 288, 150); 
    then I must used the
        ctx.fillStyle = "cadetBlue"; to change it color
    https://www.html5canvastutorials.com/tutorials/html5-canvas-text-color/
    */

    // Create gradient
    var grd = ctx.createLinearGradient(0,0,470,0); //x0, y0, x1, y1 for the colors directions
    grd.addColorStop(0,"blue"); //(0.0 to 1.0, css color)
    grd.addColorStop(0.5, "black");
    grd.addColorStop(1,"gray");

    // Fill with gradient
    ctx.fillStyle = grd; //specifies the color, gradient, or pattern to use inside shapes

    ctx.fillRect(30,225,470,15); // draws a filled rectangle whose starting point is at the coordinates (x, y) with the specified width and height and whose style is determined by the fillStyle attribute.

    //Circular gradient
    var cgrd = ctx.createRadialGradient(225, 150, 15, 270, 180, 300); /*creates a radial gradient using the coordinates of two circles.
        (x0, y0, r0, x1, y1, r1);
    */
    cgrd.addColorStop(0, "yellow");
    cgrd.addColorStop(1, "green");

    ctx.fillStyle = cgrd;
    ctx.fillRect(30, 260, 470, 45);

    //Draw Image
    var img = document.getElementById("img");
    ctx.drawImage(img, 160, 315, 195, 120);
    /*
        Provide many ways to draw an image onto the canvas

        void ctx.drawImage(image, dx, dy);
        void ctx.drawImage(image, dx, dy, dWidth, dHeight);
        void ctx.drawImage(image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight);

        OBs.: S means Source, D means Destination.
    */

    //References:
    //https://www.w3schools.com/html/html5_canvas.asp

    //https://www.w3schools.com/tags/canvas_addcolorstop.asp

    //https://developer.mozilla.org/pt-BR/docs/Web/API/CanvasRenderingContext2D

}

function setupCanvas(canvas) {
    // Get the device pixel ratio, falling back to 1.
    var dpr = window.devicePixelRatio || 1;
    // Get the size of the canvas in CSS pixels.
    var rect = canvas.getBoundingClientRect();
    // Give the canvas pixel dimensions of their CSS
    // size * the device pixel ratio.
    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    var ctx = canvas.getContext('2d');
    // Scale all drawing operations by the dpr, so you
    // don't have to worry about the difference.
    ctx.scale(dpr, dpr);
    return ctx;

    // I retrieved it from: https://www.html5rocks.com/en/tutorials/canvas/hidpi/
}

