<div class="h-layout">
    <h1 class="text-center">Update <span class="green-text">Cook</span></h1>
    <form method="POST" class="form" enctype="multipart/form-data">
        <fieldset>
            <label>
                <span>Firstname</span>
                <input type="text" name="firstname" maxlength="128" value="<?php echo $cook->firstname ?? '';?>" required>
            </label>
            <label>
                <span>Lastname</span>
                <input type="text" name="lastname" maxlength="128" value="<?php echo $cook->lastname ?? ''; ?>" required>
            </label>
            <label class="full-line">
                <span>Bio</span>
                <textarea name="bio" id="" rows="6" placeholder="Tell us a little bit about yourself"><?php echo $cook->bio ?? ''; ?></textarea>
            </label>
            <label class="full-line">
                <span>Quote</span>
                <textarea name="quote" id=""  rows="3" placeholder="What is a good cook without a quote?"><?php echo $cook->quote ?? ''; ?></textarea>
            </label>
            <label>
                <span>Picture</span>
                <input type="file" name="cookPicture" id="cookPicture" onchange="previewImage(event)">
            </label>
            <label>
                <span>Preview</span>
                <img id="preview" src="<?php 
                if($cook->{'picture-url'}) echo '/resources' . $cook->{'picture-url'};
                ?>" />
            </label>
        </fieldset>
        <button type="submit" name="update-cook">Update cook</button>
    </form>
</div>

<script>
   const previewImage = e => {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(e.target.files[0]);
      preview.onload = () => URL.revokeObjectURL(preview.src);
   };
</script>