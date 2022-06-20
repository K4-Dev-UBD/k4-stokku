<?php  

function handleUploadImage($file) {
	$fileName = $file['name'];
  $fileSize = $file['size'];
  $error = $file['error'];
  $tmpName = $file['tmp_name'];

  $acceptedImageExtensions = ['jpg', 'jpeg', 'png', 'webp'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $acceptedImageExtensions)) {
    echo "
      <script>
        alert('yang anda upload bukan gambar')
      </script>
    ";

    return false;
  }

  if ($fileSize > 4000000) {
    echo "
      <script>
        alert('ukuran gambar terlalu besar!')
      </script>
    ";

    return false;
  }

  $newFileName = uniqid();
  $newFileName .= '.'.$imageExtension;

  move_uploaded_file($tmpName, 'upload/img/'.$newFileName);
  return $newFileName;
}

?>