const state = {
  image: {
    data: null,
    fileNamePlaceholder: "No file selected..."
  }
}

const imagePreview = document.getElementById('imagePreview')

const clearImagePreview = () => {
  imagePreview.src = ""
  imagePreview.alt = ""
  document.getElementById('filePlaceholder').innerHTML = state.image.fileNamePlaceholder
}

document.getElementById('formDetailProduct').addEventListener('submit', (e) => {
  e.preventDefault();
})

document.getElementById('buttonFileCancel').addEventListener('click', () => {
  clearImagePreview()
})

document.getElementById('btnBrowseFile').addEventListener('change', function(e) {
  if (this.files.length > 0) {
    state.image.data = this.files

    const [file] = state.image.data
    imagePreview.src = URL.createObjectURL(file)
    imagePreview.alt = file.name
    document.getElementById('filePlaceholder').innerHTML = file.name
  }
})