<!DOCTYPE html>
<html lang="en">
<head>
    <title>E code</title>
    <?php require 'includes/layout.php'; ?>
    <link rel="stylesheet" href="public/css/index.css">
</head>
<body>
    <?php require 'includes/header.php'; ?>
    <div class="wrapper">
        <div class="flex-row">
            <div class="nav-bar">
                <nav class="flex-col" >
                    <div class="mb-10">
                        <h3 class="text-center ptb-10 secondary">Provide Input</h3>
                        <div class="mb-10">
                            <button id="open-custom-input" class="btn bg-dark white w-100">Custom Input</button>
                        </div>
                        <div class="mt-10">
                            <input id="runtime-input-file-upload" type="file" style="display:none;" />
                            <button id="runtime-input-file-upload-btn" class="btn bg-primary white w-100"><i class="fas fa-upload"></i> Upload File</button>
                            <div id="selected-file">Upload file with data or test cases</div>
                            <script src="public/js/runtime-input-file-upload.js"></script>
                        </div>
                    </div>
                    <div class="separate"></div>
                    <div class="pt-10">
                        <h3 class="text-center mb-10 secondary">Editor Settings</h3>
                        <!-- <div class="custom-input">
                            <label for="">Select Language</label>
                            <select id="editor-language">
                            </select>
                        </div> -->
                        <div class="custom-input">
                            <label for="">Select Theme</label>
                            <select id="editor-theme">
                            </select>
                        </div>
                        <div class="custom-input">
                            <label for="">Select Font Size</label>
                            <select id="editor-font-size">
                            </select>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="flex-row flex-1">
                <div class="flex-col flex-1 p-15">
                    <div class="menu flex-row flex-1 space-between mb-10">
                        <div>
                            <button id="run-btn" class="bg-success-pm  mr-5">Run</button>
                            <button id="stop-btn" class="bg-disabled mr-5" disabled>Stop</button>
                            <button id="raw-pgm" class="bg-primary mr-5">Raw</button>
                            <button id="copy-code" class="bg-quad mr-5"><i class="fas fa-copy"></i> Copy</button>
                            <button id="save-code-popup" class="bg-secondary mr-5"><i class="fas fa-save"></i> Save</button>
                            <button id="load-code" class="bg-primary mr-5"><i class="fas fa-code"></i> Load</button>
                            <button id="download-pgm" class="bg-tert mr-5"><i class="fas fa-download"></i> Download</button>
                            <button id="clear-editor-code" class="bg-dark-light mr-5">Clear</button>
                            <button id="reset-editor-code" class="bg-primary mr-5">Reset</button>
                            <script>
                                $('#raw-pgm').click(() => {
                                    let reqData = {
                                        user_code : editor.getSession().getValue()
                                    }
                                    $.ajax({
                                        url : 'prepare-raw.php',
                                        dataType : 'html',
                                        type : 'POST',
                                        success : (msg) => {

                                        },
                                        complete : (res) => {
                                            let anchor = document.createElement('a')
                                            anchor.href = 'raw.txt'
                                            anchor.target = '_blank'
                                            anchor.click()
                                        },
                                        data : reqData
                                    })
                                })
                                $('#download-pgm').click(() => {
                                    let reqData = {
                                        user_code : editor.getSession().getValue()
                                    }
                                    $.ajax({
                                        url : 'prepare-raw.php',
                                        dataType : 'html',
                                        type : 'POST',
                                        success : (msg) => {

                                        },
                                        complete : (res) => {
                                            let anchor = document.createElement('a')
                                            anchor.href = 'download-raw.php'
                                            anchor.target = '_blank'
                                            anchor.click()
                                        },
                                        data : reqData
                                    })
                                })
                            </script>
                            
                        </div>
                        <div>
                            <div class="select-language">
                                <label for="">Language</label>
                                <select id="pgm-lang">
                                    <option value="1">PHP</option>
                                    <option value="2">C</option>
                                    <option value="3" selected>C++</option>
                                    <option value="4">Python</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="editor-container flex-row">
                        <div id="editor">
                        </div>
                        <script>document.getElementById('editor').innerHTML = ''</script>
                    </div>

                    <div class="provide-input pt-10">
                        <div class="flex-row space-between">
                            <div class="ptb-8">
                                <span class="p-8-10 br-t-3 bg-secondary white mr-5 fs-s">Input</span>
                            </div>
                            <div></div>
                        </div>
                        <div>
                            <textarea id="runtime-input" class="br-t-3" style="height : 200px;" placeholder="Write input here..."></textarea>
                            <script>
                                $('#open-custom-input').click(() => {
                                    document.getElementById('runtime-input').focus()
                                    $('html,body').animate({
                                        scrollTop: $(".provide-input").offset().top -110},
                                        'fast');
                                })
                            </script>
                        </div>
                    </div>

                    <div class="output-container ptb-10 mt-10">
                        <div class="flex-row space-between">
                            <div class="ptb-8">
                                <span class="p-8-10 br-t-3 bg-primary white mr-5 fs-s">Program Output</span>
                                <span id="pgm-success" class="p-8-10 br-t-3 bg-success-pm white mr-5 fs-s"><i class="fas fa-check mr-5"></i> Program Finished</span>
                                <span id="pgm-error" class="p-8-10 br-t-3 bg-danger white mr-5 fs-s"><i class="fas fa-exclamation-circle mr-5"></i> Error Occurred</span>
                            </div>
                            <div class="ptb-8">
                                <span id="copy-output" class="p-8-10 br-t-3 bg-quad white cursor-p hover-shadow fs-s"><i class="fas fa-copy mr-5"></i> Copy Output</span>
                            </div>
                        </div>
                        
                        <div class="output bg-dark">
                            <div id="code-response-terminate" class="output-value"><pre id="returned-output">No Output</pre></div>
                            <script>
                                $('#copy-output').click(() => {
                                    let copy = document.getElementById('returned-output').innerHTML
                                    copyToClipboard(copy, 'Ouput Copied')
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="load-code-response">
        <div class="flex-col p-r">
            <span id="close-load-code-response" >
                <i class="fas fa-times"></i>
            </span>
            <div class="flex-row space-between p-f">
                <h4 class="pm-dark"><i class="fas fa-code mr-5"></i> Load code to editor</h4>
            </div>
            <div style="height : 40px;"></div>
            <div class="load-code-response-content flex-col">

            </div>
        </div>
    </div>
    <div class="load-code-response-overlay"></div>

<!-- Load code -->
<script>

    $('#load-code').click(() => {
        let loading = '<i class="fas fa-redo-alt fa-spin mr-5"></i> Loading'
        $('#load-code').html(loading)
        let lcrh = document.getElementsByClassName('load-code-response')[0].offsetHeight
        document.getElementsByClassName('load-code-response-content')[0].style.height = 400 + 'px'
        console.log('height : ' + lcrh)
        let reqData = {
            load : true
        }
        $.ajax({
            url : 'load-code.php',
            type : 'POST',
            dataType : 'html',
            success : (msg) => {

            },
            complete : (res) => {
                $('.load-code-response-content').html(res.responseText)
                $('.load-code-response').show()
                $('.load-code-response-overlay').show()
                $('#load-code').html('<i class="fas fa-code"></i> Load')
            },
            data : reqData

        })
    })
    $('#close-load-code-response').click(() => {
        $('.load-code-response').hide()
        $('.load-code-response-overlay').hide()
    })
</script>


    <div class="code-save-popup">
        <div class="flex-col">
            <h3 class="mb-10">Save your code permanently and load it to continue from where you stopped</h3>
            <div class="ptb-10">
                <div class="custom-input pb-20">
                    <label for="">Give your code a title to easily identify</label>
                    <input id="code-title" type="text"/>
                </div>
                <div class="flex-row space-between">
                    <button id="close-code-save-popup" class="btn bg-disabled white">Cancel</button>
                    <button id="save-code" class="btn bg-success-pm white">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="code-save-popup-overlay"></div>
    <script>
        $('#save-code-popup').click(() => {
            $('.code-save-popup').slideDown()
            $('.code-save-popup-overlay').slideDown()
        })
        $('#close-code-save-popup').click(() => {
            $('.code-save-popup').slideUp()
            $('.code-save-popup-overlay').slideUp()
        })
    </script>

<script src="./ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="public/js/configure.js"></script>


    <?php  require 'includes/footer.php'; ?>
</body>
</html>

<script>
    let programRequest;
    $('#run-btn').click(() => {
        //document.getElementById('error-btn').style.display = 'none'
        //document.getElementById('success-btn').style.display = 'none'
        //document.getElementById('raw-code-link').style.display = 'none'
        let programResponse = document.getElementById('code-response-terminate')
        if(programResponse)
            programResponse.id = 'code-response'
        let stopBtn = document.getElementById('stop-btn')
        stopBtn.className = 'bg-danger mr-5'
        stopBtn.disabled = false
        let userCode = editor. getSession(). getValue()
        let pgmLangInputs = document.getElementsByName('pgm-lang')
        let langName = document.getElementById('pgm-lang').value
        let runBtn = document.getElementById('run-btn')
        runBtn.className = 'bg-success-pm mr-5'
        runBtn.disabled = true
        runBtn.innerHTML = '<i class="fas fa-sync-alt fa-spin" style="margin-right:5px;" ></i> Running'
        console.log(langName)
        let runtimeData = document.getElementById('runtime-input').value
        let reqObj = {
            userCode,
            langName,
            runtimeData
        }
        let url = 'run-code.php'
        $('#code-response').load(url, reqObj, (response, status, xhr) => {
            programRequest = xhr
            let b = document.getElementById('returned-output')
            b.style.display = 'none'
            let w = document.getElementById('editor').offsetWidth - 20 + 'px'
            document.getElementById('returned-output').style.width = w
            b.style.display = 'block'
        })
    })
    $('#stop-btn').click(() => {
            runBtn = document.getElementById('run-btn')
            stopBtn = document.getElementById('stop-btn')
            stopBtn.className = 'bg-disabled mr-5'
            stopBtn.disabled = true
            runBtn.disabled = false
            runBtn.innerHTML = 'Run'
            runBtn.className = 'bg-success-pm mr-5'
            programResponse = document.getElementById('code-response')
            if(programResponse)
                programResponse.id = 'code-response-terminate'
            // document.getElementById('error-btn').style.display = 'none'
            // document.getElementById('success-btn').style.display = 'none'
            document.getElementById('code-response-terminate').innerHTML = 'Program stopped'

        })

</script>



<!-- save code request -->
<script>
    $('#save-code').click(() => {
       let code = editor.getSession().getValue()
       let title = document.getElementById('code-title').value
       let reqData = {
           title,
           code
       }
        $.ajax({
            url : 'save-code.php',
            type : 'POST',
            dataType : 'html',
            success : (msg) => {

            },
            complete : (res) => {
                let body = document.body
                let response = JSON.parse(res.responseText)
                let suc = response.success
                let err = response.error
                let flashMsg = document.createElement('div')
                flashMsg.className = 'flash-msg-set'
                if(suc){
                    flashMsg.innerHTML = 'Code saved successfully <i class="fas fa-check"></i>'
                    flashMsg.className += ' bg-success-pm'
                    document.getElementById('code-title').value = ''
                    $('.code-save-popup').slideUp()
                    $('.code-save-popup-overlay').slideUp()
                }
                else{
                    flashMsg.innerHTML = err
                    flashMsg.className += ' bg-danger'
                }
                body.appendChild(flashMsg)
                setTimeout(() => {
                    flashMsg.remove()
                }, 2000)
            },
            data : reqData
        })
    })
</script>

<script>
    $('#clear-editor-code').click(() => {
        let code = editor.getSession().getValue()
        // if(code != '')
        //     localStorage.setItem('editor-code', code)
        editor.setValue('')
        $('#clear-editor-code').hide()
        $('#reset-editor-code').show()
    })
    $('#reset-editor-code').click(() => {
        let code = localStorage.getItem('editor-code')
        editor.setValue(code)
        $('#clear-editor-code').show()
        $('#reset-editor-code').hide()
    })
    // load code from local storage if available
    const loadCode = () => {
        let code = localStorage.getItem('editor-code')
        if(code)
            editor.setValue(code)
    }

    loadCode()

    const saveCodeInLocalStorage = () => {
        
        let code = editor.getSession().getValue()
        if(code != ''){
            localStorage.setItem('editor-code', code)
            let msg = document.createElement('div')
            msg.className = 'bg-success-pm white p-5-10 position-lb-fixed br-3 fs-s'
            msg.innerHTML = 'Code saved in local storage <i class="fas fa-check ml-5"></i>'
            document.body.appendChild(msg)
            
            setTimeout(() => {
                msg.remove()
            }, 2000)
        }
    }
    let interval = setInterval(saveCodeInLocalStorage, 20000)

</script>
