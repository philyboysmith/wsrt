
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import focus from '@alpinejs/focus'
import morph from '@alpinejs/morph'
import persist from '@alpinejs/persist'
import precognition from 'laravel-precognition-alpine';
import ScrollReveal from 'scrollreveal'
import Glide from '@glidejs/glide'
// Call Alpine.
window.Alpine = Alpine
Alpine.plugin([collapse, focus, morph, persist, precognition])
Alpine.start()
import { tns } from "tiny-slider/src/tiny-slider"

const slides = document.getElementsByClassName('.my-slider');

if(slides){
  tns({
      "container": ".my-slider",
  
      "swipeAngle": false,
      "speed": 400,
      "controlsPosition": "bottom",
      "controlsText": ["←","→"],
      "responsive": {
          "768": {
            "items": 1,
          },
          "1024": {
            "items": 3
          }
        },
    });
}



ScrollReveal().reveal('.scroll-reveal', {
    delay: 200,
    duration: 1200,
    interval: 120
});
