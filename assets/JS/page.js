const product=[
  {
    image: "https://nekotwo.com/cdn/shop/products/pre-order-onmyoji-honkaku-gensou-morstorm-animester-onmyoji-senhime-14-scale-figure-animesterohkg-an92484-356747_1024x1024.jpg?v=1657282289",
    name: "MORSTORM & AniMester ONMYOJI Senhime 1/4 Scale Figure AniMester",
    pride: "$874.79",    
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-onmyoji-suzuka-gozen-14-scale-figure-animesteromyj-an92453-393787_1024x1024.jpg?v=1657281485",
    name:"Onmyoji - Suzuka Gozen 1/4 Scale Figure AniMester",
    pride:"$733.49",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-punishing-gray-raven-liv-luminance-generic-final-normal-edition-deluxe-edition-17-scale-figure-unknown-model6974678880049-205018_360x.jpg?v=1658339635",
    name:"LIV: LUMINANCE GENERIC FINAL (NORMAL EDITION & DELUXE EDITION) 1/7 Scale Figure",
    pride:"$324.26",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-chainsaw-man-chainsaw-man-17-scale-figure-estream4580769940534-216785_1024x1024.jpg?v=1666665765",
    name:"Chainsaw Man 1/7 Scale Figure eStream",
    pride:"$464.39",
  },  
  {
    image:"https://nekotwo.com/cdn/shop/products/Nekotwo-Genshin-Impact---Keqing-_Piercing-Thunderbolt-Ver._1-7-Scale-Figure-Apex-1673504053_360x.jpg?v=1673504055",
    name:"Keqing (Piercing Thunderbolt Ver.) 1/7 Scale Figure Apex",
    pride:"$233.43",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-genshin-impact-ganyu-plenilune-gaze-ver-17-scale-figure-apex-918955_360x.jpg?v=1657278972",
    name:"Ganyu (Plenilune Gaze Ver.) 1/7 Scale Figure Apex",
    pride:"$202.97",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-league-of-legends-jinx-17-scale-figure-myethoslol-my92352-484935_360x.jpg?v=1657280097",
    name:"League of Legends - Jinx 1/7 Scale Figure Myethos",
    pride:"$229.36",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-jujutsu-kaisen-suguru-geto-14-scale-figure-freeing4570001511295-347978_360x.jpg?v=1666666556",
    name:"Suguru Geto 1/4 Scale Figure",
    pride:"$869.39",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/Nekotwo-_Pre-order_-Chainsaw-Man---Makima-1-7-Scale-Figure-eStream-1678299717_360x.jpg?v=1678299719",
    name:"Makima 1/7 Scale Figure eStream",
    pride:"$298.68",
  },
  {
    image:"https://nekotwo.com/cdn/shop/files/Nekotwo-_Pre-order_--Slime-Isekai---Rimuru-Tempest-_Ultimate-Ver._-1-7-Scale-Figure-Estream-1691731941526_1024x1024.jpg?v=1691731942",
    name:"Rimuru Tempest (Ultimate Ver.) 1/7 Scale Figure Estream",
    pride:"$478.79",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/Nekotwo-_Pre-order_-Genshin-Impact---Xiao-_Guardian-Yaksha-Ver._-1-7-Scale-Figure-Apex-1670803558_1024x1024.jpg?v=1670803560",
    name:"Xiao (Guardian Yaksha Ver.) 1/7 Scale Figure Apex",
    pride:"$202.97",
  },
  {
    image:"https://nekotwo.com/cdn/shop/files/268ce799737692938d22eb070cd69a45.jpg_pcbanner_1024x1024.jpg?v=1695886802",
    name:"Satoru Gojo 1/7 Scale Figure Animester",
    pride:"$71.03",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-jujutsu-kaisen-kento-nanami-17-scale-figure-estream4580769940404-599232_1024x1024.jpg?v=1666666563",
    name:"Kento Nanami 1/7 Scale Figure eStream",
    pride:"$304.16",
  },
  {
    image:"https://nekotwo.com/cdn/shop/products/pre-order-date-a-barrett-kurumi-tokizaki-pigeon-blood-ruby-dress-ver-17-scale-figure-estream-963090_1024x1024.jpg?v=1657278645",
    name:"Kurumi Tokizaki (Pigeon Blood Ruby Dress Ver.) 1/7 Scale Figure Estream",
    pride:"$583.67",
  },
]

/*
  {
    image:"",
    name:"",
    pride:"",
  },
*/ 

let perPage=9;
let currentPage=1;
let start=0;
let end=perPage;

const totalPages=Math.ceil(product.length / perPage);

const btnNext = document.querySelector(".btn-next");
const btnPrev = document.querySelector(".btn-prev");

function renderProduct(){
  html='';
  const content= product.map((item, index) => {
    if (index >= start && index < end) {
      html += '<a href="./product.html" class="box">';
      html += '<img src=' + item.image + '>';
      html += '<div class="content">'
      html += '<h2 class="product-name">' + item.name + '</h2>';
      html += '<span>' + item.pride + '</span>';
      html += '</div></a>'
      return html;
    }
  })
  document.getElementById('product').innerHTML = html;
}
renderProduct();

btnNext.addEventListener('click',() => {
  currentPage++;
  if (currentPage > totalPages) {
      currentPage = totalPages;
  }
  start = (currentPage - 1) * perPage;
  end = currentPage*perPage;
  renderProduct();
})

btnPrev.addEventListener('click',() => {
  currentPage--;
  if (currentPage <= 1) {
      currentPage = 1;
  }
  start = (currentPage - 1) * perPage;
  end = currentPage*perPage;
  renderProduct();
})