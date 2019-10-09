//var colors = ['#FFEAEB', '#E85D75', '#EA638C', '#73CCD1', '#003049'];
//var colors = ['#FF77A9', '#FAF7FA', '#D0E9EB', '#008996', '#046787'];
//var colors = ['#FFFFFF'];
var colors = ['#517A96', '#A5D8FF', '#C6EBF2', '#FFE5F3', '#FFC4C7'];
//var colors = ['#7FC1E0', '#7FC1E0', '#7FC1E0', '#19647E', '#19647E', '#19647E', '#16324F', '#F6A746', '#F8F8FF', '#F8F8FF'];
var screenIsFull = false;
var divCanvas = $("#landingGraphicsSVG");
var w = divCanvas.innerWidth();
var h = divCanvas.innerHeight();
var svgCanvas = SVG('landingGraphicsSVG').size(w, h);
var cubeDimension = 51; // Statisch omdat resizen dan werkt
var opacityFactor = 0.1;
var opacityMultiplier = h * opacityFactor;
var matrix = [];
var timer;
var loop;
var counter = 0;
//var pattern = [[-1, -1], [-1, 0], [-1, 1], [0, -1], [0, 1], [1, -1], [1, 0], [1, 1]]
var pattern = [[-1, 0], [1, 0]]

// functie die een willekeurige kleur uit de colors array returned.
function getRandomColor(arrayOfColors){
    var i = getRandomValue(0, arrayOfColors.length);

    return arrayOfColors[i];
}

// Return een willekeurig getal tussen min en max
function getRandomValue(min, max) {
    return Math.floor(Math.random() * (max-min)+min);
}

// Return een getal tussen min en max positief of negatief 50% kans
function getRandomValueNegative(min, max) {
    var result = Math.floor(Math.random() * (max-min)+min);
    var i = Math.floor(Math.random()*2);

    if(i == 1) {
        return  (-result);
    } else {
        return result;
    } 
}


// Bereken en vul opnieuw de SVG canvas
function recalculateDimensions() {
    //Refresh dimensies
    w = divCanvas.innerWidth();
    h = divCanvas.innerHeight();
    opacityMultiplier = h * opacityFactor;

    //Empty de current canvas
    $("#"+svgCanvas.id()).empty();
    svgCanvas.size(w, h);
    screenIsFull = false;
    //matrix = [];
    fillSvgCanvas(svgCanvas);

    loop = mainLoop(false);
    timer = setTimeout(function() { mainLoop(true) }, 5000);
}

//Bouncing animation
function bounceAnimation(row, column, growFactor, duration) {
    if(typeof growFactor == 'undefined')
        var growFactor = 0.3;

    oldRect = matrix[row][column];
    
    //console.log("animating cube: " + row + ", " + column)
    
    //if(oldRect.attr('width') === cubeDimension)  {
        var rectangle = svgCanvas.rect(cubeDimension, cubeDimension);
        var durationStart = (duration * 1000) * 0.2;
        var durationEnd = (duration * 1000) * 0.8;
        for (let attribute in oldRect.attr()) {
            rectangle.attr(attribute, oldRect.attr()[attribute]);
        }
        oldRect.remove();
        matrix[row][column] = rectangle;
        var curWidth = rectangle.attr('width');
        var curPos = [rectangle.attr('x'), rectangle.attr('y')];
        var startPos = (curWidth < cubeDimension)? [ curPos[0] - ((cubeDimension - curWidth) /2) , curPos[1] - ((cubeDimension - curWidth) / 2 ) ] : [ curPos[0] - ((cubeDimension - curWidth) / 2) , curPos[1] - ((cubeDimension - curWidth) / 2 ) ] 
        rectangle.animate(durationStart, '>').attr({  
                                    width: (cubeDimension * growFactor),
                                    height: (cubeDimension * growFactor),
                                    x: startPos[0] - (((cubeDimension * growFactor) - cubeDimension) / 2),
                                    y: startPos[1] - (((cubeDimension * growFactor) - cubeDimension) / 2),
                                    fill: '#fff'
                                });
        rectangle.animate(durationEnd, '<').attr({
                                    width: cubeDimension,
                                    height: cubeDimension,
                                    x: startPos[0],
                                    y: startPos[1],
                                    fill: getRandomColor(colors)
        });
    //} else {
        //console.log("animation failed because already animating");
    //}
}


function fillSvgCanvas(svg) {
    var x = 0;
    var y = 0;
    var opacity = 0.02;
    matrix = [];
    var matrixRow = [];

    while(!screenIsFull) {
        var rect = svg.rect(cubeDimension, cubeDimension).attr({ 
            fill: getRandomColor(colors), 
            x: x, 
            y: y,
            opacity: opacity,
            class: 'rectangle',
            rx: cubeDimension / 2,
            ry: cubeDimension / 2
        });

        // x positie voor elk blok en toevoegen aan de row in de matrix.
        x += cubeDimension;
        matrixRow.push(rect);

        // Waarden aanpassen/resetten voor een nieuwe rij
        // Rij x naar 0, weer links beginnen. Rij y += 1, volgende rij.
        if (x >= w && y <= h){
            matrix.push(matrixRow);
            matrixRow = [];
            x = 0;
            y += cubeDimension;
            opacity = (y > opacityMultiplier) ? opacity + 0.1  : opacity + 0.01;
        }

        if(x > w && y > h) {
            screenIsFull = true;
        } else {
            screenIsFull = false;
        }
    }
}

function recursivePatternAnimation(row, column, pat) {
    //console.log("function called once for: row " + row + " and column " + column )
    if (typeof matrix[row] !== 'undefined' ) {
        if (typeof matrix[row][column] !== 'undefined') {
            bounceAnimation(row, column);

            console.log(getRandomValueNegative(0, 2) + " is a random number")
            setTimeout(function() {recursivePatternAnimation(row + getRandomValueNegative(0, 2), column + getRandomValueNegative(0, 2), pat)}, 10);
        }
    } else {
        return //mainLoop(true);
    }
}

function mainLoop(allowLoop) {
    if (allowLoop) {
        // execute functie van parameters
        var randomRow = /*Math.floor(matrix.length / 2)*/ getRandomValue(0, matrix.length);
        var randomColumn = /*Math.floor(matrix[0].length / 2)*/ getRandomValue(0, matrix[0].length);

        //console.log("Animating cube" + randomRow + ", " + randomColumn);

        if (document.hasFocus()) {
            bounceAnimation(randomRow, randomColumn, 0.3, 2.5);
            //recursivePatternAnimation(randomRow, randomColumn, pattern)
        }

        //iterate counter
        counter++;

        console.log("Dit is de waarde van de timer: " + ((95736000 / (w*h)) + 10))
        //Restart loop with interval relative to width and height
        timer = setTimeout(function() { loop = mainLoop(true) }, /*((55736000 / (w*h)) + 10)*/ 100);
    } else {
        clearTimeout(timer);
    }
}

$(document).ready(function() {
    fillSvgCanvas(svgCanvas);

    loop = mainLoop(true);
});

$(window).on('resize', function() {
    recalculateDimensions(loop);
});