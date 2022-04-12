const utils = {
  withGrid(n) {
    return n * 50;
  },
  asGridCoord(x,y) {
    return `${x*50},${y*50}`
  },
  nextPosition(initialX, initialY, direction) {
    let x = initialX;
    let y = initialY;
    const size = 16;
    if (direction === "left") { 
      x -= size;
    } else if (direction === "right") {
      x += size;
    } else if (direction === "up") {
      y -= size;
    } else if (direction === "down") {
      y += size;
    }
    return {x,y};
  }
  
}