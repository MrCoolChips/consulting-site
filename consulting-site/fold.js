var STEP_NUMBER = 15;
var STEP_TIME = 15;
var p;
var triangle;
var default_height = [];
var current_height;
var titles = [];
var index;
var timer = null;

function toggle(h)
{
	p = h.nextElementSibling;
	triangle = h.lastElementChild;
	index = titles.indexOf(h);
	console.log(index);
	if (index === -1)
	{
		index = titles.push(h) - 1;
		default_height[index] = p.offsetHeight;
	}

	if (timer === null)
	{
		if (getComputedStyle(p).display === "block")
			fold();
		else
			unfold();
	}
}

function fold()
{
	current_height = default_height[index];
	triangle.innerHTML = "&triangleright;";
	timer = setInterval(folding, STEP_TIME);
}

function unfold()
{

	current_height = 0;
	p.style.display = "block";
	triangle.innerHTML = "&triangledown;";

	timer = setInterval(unfolding, STEP_TIME);
}

function folding()
{

	current_height -= default_height[index] / STEP_NUMBER;
	if (current_height <= 0)
	{
		clearInterval(timer);
		timer = null;
		current_height = 0;
		p.style.display = "none";
	}

	p.style.height = current_height + "px";
	p.style.opacity = current_height / default_height[index];
}


function unfolding()
{
	current_height += default_height[index] / STEP_NUMBER;
	if (current_height >= default_height[index])
	{
		clearInterval(timer);
		timer = null;
		current_height = default_height[index];
	}

	p.style.height = current_height + "px";
	p.style.opacity = current_height / default_height[index];
}

function foldAll() {
    var h = document.getElementsByTagName("button");
    for (var i = 0; i < h.length; i++) {
        var header = h[i];
        index = titles.indexOf(header);
        if (index === -1) {
            index = titles.push(header) - 1;
            default_height[index] = header.nextElementSibling.offsetHeight;
        }
        var p = header.nextElementSibling;
        var triangle = header.lastElementChild;
        (function(index, p, triangle)
		{
            current_height = default_height[index];
            triangle.innerHTML = "&triangleright;";
            p.style.display = "none";
            p.style.height = "0px";
            p.style.opacity = "0";
        })(index, p, triangle);
    }
}

window.onload = function() {
    foldAll();
}
