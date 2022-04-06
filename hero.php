<div class="bg__netflix">
    <img class="bg__netflix_img" src="imgs/bg-en.jpg">
</div>
<div class="shadow"></div>
<div class="container">
    <h1 class="container__title">Unlimited movies, TV shows and more.</h1>
    <h3>Watch anywhere. Cancel anytime.</h3>
    <h4 class="label__hero_entry">Ready to watch? Enter your email to create or restart your membership.</h4>
    <form method="post" class="container__form" action="register.php">
        <span class="parent__label" onfocusin="inputfocused()" onfocusout="inputfocusout()">
            <input type="email" name="email" placeholder="Email address" id="email_entry" class="email_entry" required>
            <label id="hero_label" class="hero__label" for="email_entry">Email address</label>
            <label id="warning_label" class="warning_label"></label>
        </span>
        <button type="submit" class="button subscribe">Get Started &gt;</button>
    </form>
</div>