<template>
  <div class="footer">
    <div class="container">
      <div class="footer__logo">
        <a href="">
          <span>MOUQAF</span>
        </a>
        <span class="footer__copyright">© 2022 MOUQAF</span>
      </div>
      <div class="footer__links">
        <a href="">Home</a>
        <a href="">About</a>
        <a href="">Service</a>
        <a href="">Sign In</a>
      </div>
      <div class="social">
        <a href="">
          <FIcons :icon="['fab', 'facebook']" class="b-icon face" />
        </a>
        <a href="">
          <FIcons :icon="['fab', 'youtube']" class="b-icon you" />
        </a>
        <a href="">
          <FIcons :icon="['fab', 'twitter']" class="b-icon twit" />
        </a>
        <a href="">
          <FIcons :icon="['fab', 'instagram']" class="b-icon inst" />
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomeFooter",
};
</script>

<style scoped>
.footer,
.container {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  background-color: #fff;
  margin-bottom: 1rem;
}
.footer__logo {
  display: flex;
  flex-direction: column;
}
a {
  text-decoration: none;
  color: #22211f;
}
a > span {
  font-size: 1.3rem;
  font-weight: 800;
  transition: all 0.2s ease;
  color: #000;
  font-family: "poppins";
}
.footer__copyright {
  font-size: 0.9rem;
  font-family: "serif";
}
.footer__links {
  display: flex;
  align-items: flex-start;
  flex-direction: row;
  gap: 1rem;
  font-size: 1.2rem;
  font-weight: 500;
  font-family: serif;
}
.social {
  display: flex;
  flex-direction: row;
  gap: 1rem;
  font-size: 1.4rem;
}
.face:hover {
  color: #4267b2;
}
.you:hover {
  color: #ff0000;
}
.face:hover {
  color: #1da1f2;
}
.inst:hover {
  color: #8a3ab9;
}
@media (max-width: 750px) {
  .footer,
  .container {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    margin-bottom: 1rem;
    padding-left: 1rem;
  }
  .footer__logo {
    gap: 0.5rem;
  }
  a > span {
    font-size: 2rem;
  }
  .footer__copyright {
    font-size: 1.2rem;
  }
  .footer__links {
    font-size: 1.5rem;
  }
  .social {
    font-size: 2rem;
  }
}
@media (max-width: 380px){
.footer__links{
  flex-direction: column;
}
/* .social{
  flex-direction: column;
} */
}
</style>
