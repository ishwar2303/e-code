
$('#runtime-input-file-upload-btn').click(() => {
    let res = document.getElementById('selected-file')
    res.className = ''
    res.innerHTML = ''
    res.style.padding = '0'
    $('#runtime-input-file-upload').click()
})
let runTimeFileUpload = document.getElementById('runtime-input-file-upload')
runTimeFileUpload.addEventListener('change', () => {
    let file = runTimeFileUpload
    file = file.files[0]
    let res = document.getElementById('selected-file')
    res.style.padding = '10px 5px'
    var fd = new FormData()
    fd.append('file',file);
    if(file){
        let errorIcon = '<i class="fas fa-exclamation-circle mr-5"></i>'
        let fileName = file.name
        if(fileName.length > 50)
            fileName = fileName.substring(0,10) + '...' + fileName.substring(fileName.length - 20, fileName.length)
        if(file.type != 'text/plain'){
            res.innerHTML = errorIcon + 'Invalid File'
            res.className = 'bg-danger'
            res.style.display = 'block'
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
                    res.style.display = 'block'
                },
                complete : (r) => {
                    r = JSON.parse(r.responseText)
                    if(r.success){
                        res.innerHTML = fileName + '<br/>' + r.success + '<br/>' + 'Run your program'
                        document.getElementById('custom-input-block').style.display = 'none'
                        document.getElementById('open-custom-input').style.display = 'block'
                        document.getElementById('runtime-input').value = ''
                        res.style.display = 'block'
                    }
                    else{
                        res.innerHTML = errorIcon + r.error
                        res.className = 'bg-danger'
                        res.style.display = 'block'
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