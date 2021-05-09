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
                <nav class="flex-col">
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
                    <div class="separate"></div>
                    <div>
                        <h3 class="text-center ptb-10 secondary">Provide Input</h3>
                        <div class="mb-10">
                            <button id="open-custom-input" class="btn bg-dark white w-100">Custom Input</button>
                        </div>
                        <div id="custom-input-block" class="custom-input mb-10 pb-20" style="height : 150px;">
                            <label for="">Custom Input</label>
                            <textarea class="w-100" id="runtime-input"></textarea>
                        </div>
                        <script>
                            $('#open-custom-input').click(() => {
                                document.getElementById('custom-input-block').style.display = 'flex'
                                document.getElementById('open-custom-input').style.display = 'none'
                            })
                        </script>
                        <div class="mt-10">
                            <input id="runtime-input-file-upload" type="file" style="display:none;" />
                            <button id="runtime-input-file-upload-btn" class="btn bg-primary white w-100"><i class="fas fa-upload"></i> Upload File</button>
                            <div id="selected-file">Upload file with data or test cases</div>
                            <script src="public/js/runtime-input-file-upload.js"></script>
                        </div>
                    </div>
                    <div>
                    </div>
                    
                </nav>
            </div>
            <div class="flex-row flex-1">
                <div class="flex-col flex-1 p-15">
                    <div class="menu flex-row flex-1 space-between mb-10">
                        <div>
                            <button id="run-btn" class="bg-success-pm  mr-5">Run</button>
                            <button id="stop-btn" class="bg-disabled mr-5" disabled>Stop</button>
                            <button id="run-pgm" class="bg-primary mr-5">Raw</button>
                            <button id="copy-code" class="bg-quad mr-5"><i class="fas fa-copy"></i> Copy</button>
                            <button id="save-code-popup" class="bg-secondary mr-5"><i class="fas fa-save"></i> Save</button>
                            <button id="run-pgm" class="bg-tert"><i class="fas fa-download"></i> Download</button>
                            
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
                    <div class="output-container ptb-10 mt-10">
                        <h3 class="output-label">Program Output</h3>
                        <div class="output bg-dark">
                            <pre id="code-response-terminate">No output</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    

    <div class="code-save-popup">
        <div class="flex-col">
            <h3 class="mb-10">Save your code permanently and load it to continue from where you stopped</h3>
            <div class="ptb-10">
                <div class="custom-input">
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
        //$('.overlay').toggle()
        setTimeout(() => {
            $('#code-response').load(url, reqObj, (response, status, xhr) => {
                programRequest = xhr
            })
        }, 2000);
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