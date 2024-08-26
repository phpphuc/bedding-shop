/** @type {import('tailwindcss').Config} */
// @font-face {
//   font-family: UTM-Flamenco;
//   src: url('fonts/UTM-Flamenco.ttf');
// }
// @font-face {
//   font-family: HP-Avo;
//   src: url('fonts/HP-Avo.ttf');
// }
// @font-face {
//   font-family: UTM-Avo;
//   src: url('./fonts/UTM Avo.ttf');
// }
module.exports = {
  // content: ["./frontend/views/*/*/*.{js, php}"],
  content: ["./frontend/**/*.php", "./frontend/views/category/index.php"],
  // content: ["./frontend/**/*.php", "./frontend/views/site/index.php"],
  // content: ["E:/2024/365/miglobalv/frontend/views/site/index.php"],
  // content: ["./frontend/*.php"],
  theme: {
    container: {
      center: true,
    },
    fontFamily: {
      "utm-flamenco": ["UTM-Flamenco", "serif"],
      "hp-avo": ["HP-Avo"],
      "utm-avo": ["UTM-Avo"],
      roboto: ["Roboto"],
      "uvn-moi-hong": ["UVN-Moi-Hong"],
      tahoma: ["Tahoma"],
    },
    extend: {
      screens: {
        sm: "640px",
        // => @media (min-width: 640px) { ... }

        md: "768px",
        // => @media (min-width: 768px) { ... }

        lg: "1024px",
        // => @media (min-width: 1024px) { ... }

        xl: "1366px",
        // => @media (min-width: 1280px) { ... }

        "2xl": "1536px",
        // => @media (min-width: 1536px) { ... }
      },
      // maxWidth: {
      //   1200: '1200px', // Định nghĩa max-width cho màn hình 1366px trở lên
      // },

      colors: {
        primary: "#f44880",
      },
    },
  },
  plugins: [],
};
