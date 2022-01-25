<form method="POST" enctype="multipart/form-data" action="">
    <div class="form-group">
        <label>Name</label>
        <input name="name" value="<?php echo $user["name"];?>" class="form-control">
    </div>
    <div class="form-group">
        <label>website</label>
        <input name="website" value="<?php echo $user["website"];?>" class="form-control">
    </div>
    <div class="form-group"> 
        <label>image</label>
        <input name="imagen" type="hidden" value="<?php  echo $userID; ?>" class="form-control">
        <input name="image" type="file" class="form-control-file">
    </div>    
    
    <button class="btn btn-success">Submit</button>
</form>