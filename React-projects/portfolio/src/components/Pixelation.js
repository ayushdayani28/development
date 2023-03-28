import React from 'react'

const PIXELATION = 0.01;

function loadImage(src) {
  return new Promise((resolve, reject) => {
    const img = new Image();
    img.src = require(`../${src}`);
    img.crossOrigin = 'anonymous';
    img.onload = function () {
      resolve(img);
    }
  })
}

function makeCanvas(img, containerRef) {
  const canvas = document.createElement('canvas');
  canvas.style.cssText = `
    image-rendering: crisp-edges;
    image-rendering: pixelated;
  `;
  const ctx = canvas.getContext('2d');
  ctx.imageSmoothingEnabled = false;
  containerRef.current.appendChild(canvas);
  return { canvas, ctx };
}

// function getPixelData(img, canvas, ctx) {
//   ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
//   const pixelData = ctx.getImageData(0, 0, canvas.width, canvas.height);
//   return pixelData.data;
// }

function pixelate(pixelation, canvas, ctx, imageEl) {
  // set canvas to not smooth out the image (imageSmoothingEnabled)
  const littleW = pixelation * canvas.width;
  const littleH = pixelation * canvas.height;
  ctx.imageSmoothingEnabled = false;
  ctx.drawImage(imageEl, 0, 0, littleW, littleH);
  ctx.drawImage(canvas, 0, 0, littleW, littleH, 0, 0, canvas.width, canvas.height);
}

function fadeIn(PIXELATION, threshold, canvas, ctx, imageEl, fadeFlag, fadeCallback) {
  let pix = PIXELATION;
  let fadeoutCanvas = fadeFlag;
  if (pix >= threshold / 2 && !fadeoutCanvas) {
    fadeoutCanvas = true;
    fadeCallback();
  }
  if (pix <= threshold) {
    pix += 0.01;
    pixelate(pix, canvas, ctx, imageEl);
    setTimeout(() => fadeIn(pix, threshold, canvas, ctx, imageEl, fadeoutCanvas, fadeCallback), 200)
  }
}

function PixelatedImageReveal({ imageUrl }) {
  const containerRef = React.useRef(null);

  React.useEffect(() => {
    loadImage(imageUrl).then(imageEl => {
      const { canvas, ctx } = makeCanvas(imageEl, containerRef);
      canvas.width = imageEl.width;
      canvas.height = imageEl.height;
      const showImage = () => {
        imageEl.classList.add('show');
        canvas.classList.add('fadeout');
      };

      pixelate(PIXELATION, canvas, ctx, imageEl);
      setTimeout(() => {
        fadeIn(PIXELATION, 1, canvas, ctx, imageEl, false, showImage);
      }, 100)
    });
  }, [imageUrl]);

  return (
    <div className="canva-cont" ref={containerRef}>
      <img className="pixelate hide" src={require(`../${imageUrl}`)} alt="profile pic" />
    </div>
  );
}

export default PixelatedImageReveal