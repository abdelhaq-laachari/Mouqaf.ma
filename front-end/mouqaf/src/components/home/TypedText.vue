<template>
  <p>
    Hire the best
    <span class="typed-text text-info">Handyman</span>
    <!-- <span class="typed-text text-info"> {{ typeValue }} </span>
    <span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span> -->
    <br />
    for any job, <br />
    online.
  </p>
</template>

<script>
export default {
  name: "HomeView",
  components: {},
  data: () => {
    return {
      typeValue: "",
      typeStatus: false,
      typeArray: ["Electrician", "Plumber", "Gardener", "Painter", "Handyman"],
      typingSpeed: 200,
      erasingSpeed: 100,
      newTextDelay: 1000,
      typeArrayIndex: 0,
      charIndex: 0,
    };
  },
  methods: {
    typeText() {
      if (this.charIndex < this.typeArray[this.typeArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.typeArray[this.typeArrayIndex].charAt(
          this.charIndex
        );
        this.charIndex += 1;
        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.typeStatus = false;
        setTimeout(this.eraseText, this.newTextDelay);
      }
    },
    eraseText() {
      if (this.charIndex > 0) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue = this.typeArray[this.typeArrayIndex].substring(
          0,
          this.charIndex - 1
        );
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.typeArrayIndex += 1;
        if (this.typeArrayIndex >= this.typeArray.length)
          this.typeArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
  },
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
  },
};
</script>

<style scoped>
p {
  font-size: 2.5rem;
  color: #fff;
  font-weight: 500;
  font-family: "poppins";
}
span.typed-text {
  font-size: 2.5rem;
  /* color: rgb(153, 12, 169); */
  font-weight: 500;
  font-family: "poppins";
}
span.cursor {
  display: inline-block;
  margin-left: 3px;
  width: 4px;
  background-color: #fff;
  animation: cursorBlink 1s infinite;
}
span.cursor.typing {
  animation: none;
}
@keyframes cursorBlink {
  49% {
    background-color: #fff;
  }
  50% {
    background-color: transparent;
  }
  99% {
    background-color: transparent;
  }
}

@media (min-width: 2000px){
  p , span.typed-text {
    font-size: 4.6rem;
  }
}
@media (min-width: 1400px) and (max-width: 2000px){
  p , span.typed-text {
    font-size: 3.6rem;
  }
}

@media (max-width: 980px) {
  p , span.typed-text {
    font-size: 2rem;
  }
}
@media (max-width: 600px) {
  p , span.typed-text {
    font-size: 1.6rem;
  }
}
</style>
