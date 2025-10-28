document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".filter-btn")
  const productCards = document.querySelectorAll(".product-card")

  // Função de filtro
  function filterProducts(filterType) {
    productCards.forEach((card, index) => {
      const cardType = card.getAttribute("data-type")

      // Remove animação anterior
      card.style.animation = "none"

      if (filterType === "all" || cardType === filterType) {
        card.classList.remove("hidden")
        // Adiciona delay escalonado para animação
        setTimeout(() => {
          card.style.animation = `cardFadeIn 0.6s ease-out ${index * 0.1}s both`
        }, 10)
      } else {
        card.classList.add("hidden")
      }
    })
  }

  // Event listeners para botões de filtro
  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Remove active de todos os botões
      filterButtons.forEach((btn) => btn.classList.remove("active"))

      // Adiciona active ao botão clicado
      this.classList.add("active")

      // Filtra produtos
      const filterType = this.getAttribute("data-filter")
      filterProducts(filterType)
    })
  })

  // Animação de hover nos cards
  productCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transition = "all 0.4s cubic-bezier(0.4, 0, 0.2, 1)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transition = "all 0.4s cubic-bezier(0.4, 0, 0.2, 1)"
    })
  })

  // Animação inicial dos cards
  productCards.forEach((card, index) => {
    card.style.animation = `cardFadeIn 0.6s ease-out ${index * 0.1}s both`
  })

  // Animação para table rows on weekly page
  const tableRows = document.querySelectorAll(".table-row")
  tableRows.forEach((row, index) => {
    row.style.animation = `fadeInUp 0.4s ease-out ${index * 0.05}s both`
  })

  // Efeito parallax suave no scroll
  let ticking = false

  window.addEventListener("scroll", () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        const scrolled = window.pageYOffset
        const parallaxElements = document.querySelectorAll(".product-card")

        parallaxElements.forEach((element, index) => {
          const speed = 0.5
          const yPos = -(scrolled * speed * ((index % 3) + 1) * 0.1)
          element.style.transform = `translateY(${yPos}px)`
        })

        ticking = false
      })

      ticking = true
    }
  })
})
