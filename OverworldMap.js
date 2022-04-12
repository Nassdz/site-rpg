class OverworldMap {
  constructor(config) {
    this.gameObjects = config.gameObjects;
    this.walls = config.walls || {};
    this.lowerImage = new Image();
    this.lowerImage.src = config.lowerSrc;

    this.upperImage = new Image();
    this.upperImage.src = config.upperSrc;
  }

  drawLowerImage(ctx) {
    ctx.drawImage(this.lowerImage, 0, 0)
  }
  drawUpperImage(ctx) {
    ctx.drawImage(this.upperImage, 0, 0)
  } 
  isSpaceTaken(currentX, currentY, direction) {
    const {x,y} = utils.nextPosition(currentX, currentY, direction);
    return this.walls[`${x},${y}`] || false;
  }

  mountObjects() {
    Object.values(this.gameObjects).forEach(o => {

      //TODO: determine if this object should actually mount
      o.mount(this);

    })
  }

  addWall(x,y) {
    this.walls[`${x},${y}`] = true;
  }
  removeWall(x,y) {
    delete this.walls[`${x},${y}`]
  }
  moveWall(wasX, wasY, direction) {
    this.removeWall(wasX, wasY);
    const {x,y} = utils.nextPosition(wasX, wasY, direction);
    this.addWall(x,y);
  }
}

window.OverworldMaps = {
  ///game objects
  mainroom: {
    lowerSrc: "/images/map_idriss.png",
    upperSrc: "/images/map_idriss.png",
    gameObjects: {
      hero: new Person({
        isPlayerControlled: true,
        x: utils.withGrid(5),
        y: utils.withGrid(6),
        src: "/images/warrior_m.png"
      }),
      npcA: new Person({
        x: utils.withGrid(6),
        y: utils.withGrid(8),
        src: "/images/river.png"
      }),
    }
  },
  walls: {
    //"16,16": true
    [utils.asGridCoord(6,8)]: true
}
}