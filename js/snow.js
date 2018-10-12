/*
All code belongs to Sloan.

Created by Sloan AKA Sloansta

This code may be used freely, just give credit!
*/

window.onload = function() {
  const WIDTH = window.innerWidth - 20,
    HEIGHT = window.innerHeight - 20;
  var canvas = document.getElementById('canvas'),
    c = canvas.getContext('2d');

  canvas.width = WIDTH;
  canvas.height = HEIGHT;

  var snowIndex = [],
    snowNumber = 0;

  function Snow() {
    this.x = Math.random() * WIDTH;
    this.y = 0;
    this.vx = Math.random() * 1 + -1;
    this.vy = Math.random() * 5;
    this.gravity = 0.1;
    snowNumber++;
    snowIndex[snowNumber] = this;
    this.id = snowNumber;
  }

  Snow.prototype.draw = function() {
    this.x += this.vx;
    this.y += this.vy;
    c.fillStyle = 'white';
    c.font='20px Arial';
    c.fillText('❄', this.x, this.y, 100);
    if (this.x >= WIDTH)
      delete snowIndex[this.id];
    else if (this.x <= 0)
      delete snowIndex[this.id];

    if (this.y >= HEIGHT)
      delete snowIndex[this.id];
    else if (this.y <= 0)
      delete snowIndex[this.id];
  };

  Update();
  setInterval(function() {
    new Snow();
  }, 50);

  function Update() {
    requestAnimationFrame(Update);
    // c.fillStyle = 'rgba(0, 0,0,0)';
    c.clearRect(0, 0, WIDTH, HEIGHT);
    for (var i in snowIndex)
      snowIndex[i].draw();
  }
};