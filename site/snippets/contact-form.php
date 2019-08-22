<form class="contact-form" action="<?= $page->url() ?>" method="post">

  <div class="form-element">
    <!-- <label for="firstname">First Name: *</label> -->
    <input type="text" id="firstname" name="firstname" placeholder="First" value="<?= isset($data['firstname']) ? esc($data['firstname']) : '' ?>" required/>
  </div>

  <div class="form-element">
    <!-- <label for="lastname">Last Name: *</label> -->
    <input type="text" id="lastname" name="lastname" placeholder="Last" value="<?= isset($data['lastname']) ? esc($data['lastname']) : '' ?>" required/>
  </div>

  <div class="form-element">
    <!-- <label for="email">Email: *</label> -->
    <input type="email" name="email" id="email" placeholder="mail@example.com" value="<?= isset($data['email']) ? esc($data['email']) : '' ?>" required/>
  </div>

  <div class="form-element">
    <!-- <label for="message">Message:</label> -->
    <textarea name="message" id="message" placeholder="Please leave me your kind words here. . ."><?= isset($data['message']) ? esc($data['message']) : '' ?></textarea>
  </div>

  <div class="honey">
     <!-- <label for="message">If you are a human, leave this field empty</label> -->
     <input type="website" name="website" id="website" placeholder="http://example.com" value="<?= isset($data['website']) ? esc($data['website']) : '' ?>"/>
  </div>
  <!-- <p>* required</p> -->

  <button class="button" type="submit" name="register" value="Register">Submit</button>

</form>
