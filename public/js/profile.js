$('#imageUpload').on('change', function() {

  var file = this.files[0];
  var imagefile = file.type;
  var imageTypes = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
  if (imageTypes.indexOf(imagefile) == -1) {
      //display error
      return false;
  }
  else {
      var reader = new FileReader();
      reader.onload = function(e) {
          $("#preview").html('<img src="' + e.target.result + '" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;height: 150px;"/>');
      };
      reader.readAsDataURL(this.files[0]);
  }

});