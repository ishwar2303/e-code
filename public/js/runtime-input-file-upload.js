
$('#runtime-input-file-upload-btn').click(() => {
    $('#runtime-input-file-upload').click()
})
let runTimeFileUpload = document.getElementById('runtime-input-file-upload')
runTimeFileUpload.addEventListener('change', () => {
    let file = runTimeFileUpload
    file = file.files[0]
    let res = document.getElementById('selected-file')
    var fd = new FormData()
    fd.append('file',file);
    if(file){
        let fileName = file.name
        if(fileName.length > 50)
            fileName = fileName.substring(0,10) + '...' + fileName.substring(fileName.length - 20, fileName.length)
        if(file.type != 'text/plain'){
            res.innerHTML = 'Invalid File'
            res.className = 'bg-danger'
        }
        else {
            res.className = 'bg-success-pm'
            res.innerHTML = fileName
            $.ajax({
                url : 'upload-runtime-input-file.php',
                type : 'post',
                contentType : false,
                processData : false,
                success : () => {
                    res.innerHTML += '<br/> <i class="fas fa-redo-alt fa-spin"></i> Uploading'
                },
                complete : (r) => {
                    r = JSON.parse(r.responseText)
                    if(r.success){
                        res.innerHTML = fileName + '<br/>' + r.success
                        document.getElementById('custom-input-block').style.display = 'none'
                        document.getElementById('open-custom-input').style.display = 'flex'
                        document.getElementById('runtime-input').value = ''
                    }
                    else{
                        res.innerHTML = r.error
                        res.className = 'bg-danger'
                    }
                },
                data : fd
            })
        }
    }
        
    else {
        res.className = 'bg-disabled'
        res.innerHTML = 'No file selected'
    }
})