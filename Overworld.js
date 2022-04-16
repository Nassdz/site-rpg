class Overworld {
  constructor(config) {
    this.element = config.element;
    this.canvas = this.element.querySelector(".game-canvas");
    this.ctx = this.canvas.getContext("2d");
    this.map = null;
  }
 
  startGameLoop() {
    const step = () => {
 
     //Clear off the canvas
     this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
 
     //Draw Lower layer
     this.map.drawLowerImage(this.ctx);
     //Draw Upper layer

     //drawobject
     Object.values(this.map.gameObjects).forEach(object => {
      object.update({
        arrow: this.directionInput.direction,
        map: this.map
      })
      object.sprite.draw(this.ctx);
    })
     
    
 
 
      requestAnimationFrame(() => {
       step();   
      })
    }
    step();
  }
 
  init() {
    this.map = new OverworldMap(window.OverworldMaps.mainroom);
    this.map.mountObjects();
    this.directionInput = new DirectionInput();
    this.directionInput.init();
  
    this.startGameLoop();
   
 
 
  }
 
 }
init() {
   const warrior_m = new GameObject({
     x: 5,//exemple
     y: 6,//exemple
   })
   const item1 = new GameObject({
    x: 7,//exemple
    y: 9,//exemple
    src:"" // image de l'iteme en question
  })

  setTimeout(() => {
    warrior_m.sprite.draw(this.ctx);
    item1.sprite.draw(this.ctx);
  }, 200)

  
 }
