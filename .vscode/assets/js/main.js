

(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  let selectTopbar = select('#topbar')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.add('topbar-scrolled')
        }
      } else {
        selectHeader.classList.remove('header-scrolled')
        if (selectTopbar) {
          selectTopbar.classList.remove('topbar-scrolled')
        }
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Menu isotope and filter
   */
  window.addEventListener('load', () => {
    let menuContainer = select('.menu-container');
    if (menuContainer) {
      let menuIsotope = new Isotope(menuContainer, {
        itemSelector: '.menu-item',
        layoutMode: 'fitRows'
      });

      let menuFilters = select('#menu-flters li', true);

      on('click', '#menu-flters li', function(e) {
        e.preventDefault();
        menuFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        menuIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        menuIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });



  /**
   * Initiate glightbox 
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Events slider
   */
  new Swiper('.events-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    }
  });

  /**
   * Initiate gallery lightbox 
   */
  const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

})()

 /**
   * Menu order
   */

 const orderList = document.getElementById("order-list");
 const totalAmount = document.getElementById("total-amount");
 const orderPopup = document.getElementById("order-popup");
 const orderPopupList = document.getElementById("order-popup-list");
 const orderPopupTotal = document.getElementById("order-popup-total");
 const clearOrderButton = document.getElementById("clear-order-button");
 const orderItems = {};

 function addToOrder(itemName, price, inputId) {
  const quantityInput = document.getElementById(inputId);
  const quantity = parseInt(quantityInput.value) || 0;
  const addButton = document.querySelector(`button[onclick="addToOrder('${itemName}', ${price}, '${inputId}')"]`);

  if (quantity > 0) {
      if (orderItems[itemName]) {
          orderItems[itemName].quantity = quantity;
      } else {
          orderItems[itemName] = { quantity, price };
      }


      // Change the button text to "Added"
      addButton.textContent = "Added";

      // Change the button color to green
      addButton.style.backgroundColor = "green";
      addButton.style.border = "1px solid black";
      addButton.style.color = "white";

      quantityInput.addEventListener("input", function () {
        addButton.textContent="Add to order"
        addButton.style.color="black"
        addButton.style.backgroundColor = "#D9D9D9";
        addButton.style.border = "1px solid #000000";
      });
      

      // Update the order summary
      updateOrderSummary();
  }
}

 function updateItem(itemName, price, inputId) {
     const quantity = parseInt(document.getElementById(inputId).value) || 0;
     if (orderItems[itemName]) {
         orderItems[itemName].quantity = quantity;
         updateOrderSummary();
     }
 }

 function updateOrderSummary() {
     orderList.innerHTML = "";
     let total = 0;

     for (const itemName in orderItems) {
         const item = orderItems[itemName];
         total += item.quantity * item.price;
         const li = document.createElement("li");
         const removeButton = document.createElement("button");
         removeButton.textContent = "Remove";
         removeButton.className = "remove-button"; // Apply the style here
         removeButton.onclick = function () { removeItem(itemName); };
         li.textContent = `${itemName} x${item.quantity} - Nu ${item.quantity * item.price} `;
         li.appendChild(removeButton);
         orderList.appendChild(li);
     }

     totalAmount.textContent = total;
 }


 function removeItem(itemName) {
     delete orderItems[itemName];
     updateOrderSummary();
 }

 function addOrderToReservationForm() {
  const messageTextarea = document.querySelector('textarea[name="message"]');
  const orderDetails = getOrderDetails();

  // Display the message popup
  const popup = document.getElementById("popup");
  const popupMessage = document.getElementById("popup-message");
  const tableLink = document.querySelector("#popup li a");

  popup.style.display = "block";

  // Check if the order summary is empty
  const orderList = document.getElementById("order-list");

  if (orderList.textContent.trim() === '') {
      // Set the popup message to "Please Order your menu first"
      popupMessage.textContent = "Please Order your menu first";

      // Hide the "Go to your table" link
      tableLink.style.display = "none";

      // Check if the textarea is not empty, then show the <p> element
      const preferenceMessage = document.getElementById("preference-message");
      if (messageTextarea.value.trim() !== '') {
          preferenceMessage.style.display = "block";
      } else {
          preferenceMessage.style.display = "none";
      }
  } else {
      // Update the message in the popup
      popupMessage.textContent = "Your Order has been added";

      // Show the "Go to your table" link
      tableLink.style.display = "block";

      // Append the order details to the existing message (you can customize the format)
      if (messageTextarea && orderDetails) {
          messageTextarea.value = "\n\n--- Order Details ---\n" + orderDetails;
      }

      // Show the <p> element
      const preferenceMessage = document.getElementById("preference-message");
      preferenceMessage.style.display = "block";
  }

  closeOrderPopup();
}



function closePopup() {
  // Close the message popup
  const popup = document.getElementById("popup");
  popup.style.display = "none";
}


 function getOrderDetails() {
  let orderDetails = "";
  let total = 0;

  for (const itemName in orderItems) {
      const item = orderItems[itemName];
      const itemTotal = item.quantity * item.price;

      orderDetails += `${itemName} x${item.quantity} - Nu ${itemTotal} ( )\n`;

      // Update the total for each item
      total += itemTotal;
  }

  // Include the total in the order details
  orderDetails += `Total: Nu ${total}`;

  return orderDetails;
}


 function closeOrderPopup() {
     orderPopup.style.display = "none";
 }

 clearOrderButton.addEventListener("click", clearOrder); 

 