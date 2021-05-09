
const editor = ace.edit("editor")
editor.setTheme("ace/theme/tomorrow_night_eighties")
editor.session.setMode("ace/mode/c_cpp")
editor.setOptions({fontSize: "13pt" })

const languageSetting = () => {
    const lang = ["JavaScript", "ABAP", "ABC", "ActionScript", "ADA", "Alda", "Apache Conf", "Apex", "AQL", "AsciiDoc", "ASL", "Assembly x86", "AutoHotkey / AutoIt", "BatchFile", "c_cpp", "C#", "C9 Search Results", "Cirru", "Clojure", "Cobol", "CoffeeScript", "ColdFusion", "Crystal", "Csound", "Csound Document", "Csound Score", "CSS", "Curly", "D", "Dart", "Diff", "Django", "Dockerfile", "Dot", "Drools", "Edifact", "Eiffel", "EJS", "Elixir", "Elm", "Erlang", "Forth", "Fortran", "FreeMarker", "FSharp", "FSL", "Gcode", "Gherkin", "Gitignore", "Glsl", "Go", "Gobstones", "GraphQLSchema", "Groovy", "HAML", "Handlebars", "Haskell", "Haskell Cabal", "haXe", "Hjson", "HTML", "HTML (Elixir)", "HTML (Ruby)", "INI", "Io", "Jack", "Jade", "Java", "JSON", "JSON5", "JSONiq", "JSP", "JSSM", "JSX", "Julia", "Kotlin", "LaTeX", "LESS", "Liquid", "Lisp", "LiveScript", "LogiQL", "LSL", "Lua", "LuaPage", "Lucene", "Makefile", "Markdown", "Mask", "MATLAB", "Maze", "MediaWiki", "MEL", "MIXAL", "MUSHCode", "MySQL", "Nginx", "Nim", "Nix", "Nix", "NSIS", "Nunjucks", "Objective-C", "OCaml", "Pascal", "Perl", "Perl 6", "pgSQL", "PHP", "PHP (Blade Template)", "Pig", "Plain Text", "Powershell", "Praat", "Prisma", "Prolog", "Properties", "Protobuf", "Puppet", "Python", "QML", "R", "Razor", "RDoc", "Red", "RHTML", "RST", "Ruby", "Rust", "SASS", "SCAD", "Scala", "Scheme", "SCSS", "SH", "SJS", "Slim", "Smarty", "snippets", "Soy Template", "Space", "SQL", "SQLServer", "Stylus", "SVG", "Swift", "Tcl", "Terraform", "Tex", "Text", "Textile", "Toml", "TSX", "Twig", "Typescript", "Vala", "VBScript", "Velocity", "Verilog", "VHDL", "Visualforce", "Wollok", "XML", "XQuery", "YAML", "Zeek"]
    
    let select = document.getElementById('editor-language')
    lang.forEach((l) => {
        let o = document.createElement('option')
        o.value = l
        o.innerHTML = l
        if(l == 'c_cpp'){
            o.innerHTML = 'C and C++'
            o.selected = true
        }
        select.appendChild(o)
    })
    
    select.addEventListener('change', () => {
        changeEditorTheme(select.value)
    })
    
    const changeEditorTheme = (t) => {
        editor.session.setMode("ace/mode/" + t)
    }
}

//languageSetting()

// change editor theme through select option
const themeSetting = () => {

    const theme = ["chrome", "clouds", "crimson_editor", "dawn", "dreamweaver", "eclipse", "github", "iplastic", "solarized_light", "textmate", "tomorrow", "xcode", "kuroir", "katzenmilch", "sqlserver", "ambiance", "chaos", "clouds_midnight", "dracula", "cobalt", "gruvbox", "gob", "idle_fingers", "kr_theme", "merbivore", "merbivore_soft", "mono_industrial", "monokai", "nord_dark", "pastel_on_dark", "solarized_dark", "terminal", "tomorrow_night", "tomorrow_night_blue", "tomorrow_night_bright", "tomorrow_night_eighties", "twilight", "vibrant_ink"]

    let select = document.getElementById('editor-theme')
    theme.forEach((t) => {
        let o = document.createElement('option')
        o.value = t
        o.innerHTML = t
        if(t == 'tomorrow_night_eighties')
            o.selected = true
        select.appendChild(o)
    })
    
    select.addEventListener('change', () => {
        changeEditorTheme(select.value)
    })
    
    const changeEditorTheme = (t) => {
        editor.setTheme("ace/theme/" + t)
    }
}

themeSetting()

// change editor font size
const fontSetting = () => {

    const size = [
        {
            name : "Small",
            value : '10pt'
        },
        {
            name : "Medium (Recommended)",
            value : '13pt'
        },
        {
            name : "Large",
            value : '16pt'
        },
        {
            name : 'X Large',
            value : '18pt'
        },
        {
            name : "XX Large",
            value : '20pt'
        }
    ]

    let select = document.getElementById('editor-font-size')
    size.forEach((t) => {
        let o = document.createElement('option')
        o.value = t.value
        o.innerHTML = t.name
        if(o.value == "13pt")
            o.selected = true
        select.appendChild(o)
    })
    
    select.addEventListener('change', () => {
        changeEditorTheme(select.value)
    })
    
    const changeEditorTheme = (t) => {
        editor.setOptions({fontSize: t })
    }
}

fontSetting()

// copy code
var copyToClipboard = (copyCode) => {
    copyCode = copyCode.trim()
    let textarea = document.createElement('textarea')
    textarea.type = 'hidden'
    textarea.value = copyCode
    document.body.appendChild(textarea)
    textarea.select()
    document.execCommand('copy')
    document.body.removeChild(textarea)
}

const copySetting = () => {
    let copyBtn = document.getElementById('copy-code')
    copyBtn.addEventListener('click', () => {
        copyBtn.disabled = true
        copyBtn.className = 'bg-disabled mr-5'
        copyToClipboard(editor. getSession(). getValue())
        let body = document.body
        let msg = document.createElement('div')
        msg.className = 'code-copied'
        msg.innerHTML = 'Code Copied &nbsp; <i class="fas fa-check"></i>'
        body.appendChild(msg)   
        setTimeout(() => {
            msg.remove()
            copyBtn.className = 'bg-quad mr-5'
            copyBtn.disabled = false
        }, 2000)
    })
}
copySetting()