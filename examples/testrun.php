<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Responsive Voice Test</title>
<script type='text/javascript' src='http://code.jquery.com/jquery-2.1.4.min.js'></script>
<?php

    $rvfile = "responsivevoice.src.js";
    if (isset($_GET["rv"])) {
        $rvfile = $_GET["rv"];
    }
?>
<script type='text/javascript' src='../<?=$rvfile?>'></script>

<style>
    
    body {
        
        font-family: Arial;
        
    }

    .test {
        color:orange;
    }
    
    .buttonc {
        margin-top:5px;
    }
    
    .rvbuilds {
        
        margin: 10px;
    }
    
    .rvbuildselected {
        color:green;
        font-weight:bold;
    }
    
</style>

<script>



function addTest(id) {
    
    $('<div>').attr('class','test')
            .attr('id',id.replace(' ','_'))
            .html(id + "    ?")
            .appendTo($("#tests"));
    
    
}
function testDone(id,result, message) {
    
    $("#" + id.replace(' ','_')).css('color',result?'green':'red');
    
    if (message!=null) {
        $("#" + id.replace(' ','_')).html(id + "..." + message);
    }else{
        $("#" + id.replace(' ','_')).html(id + "..." + (result?'YES':'NO'));
    }
}


var windowReady = false;
var voiceReady = false;

$(window).load( function() {

    windowReady = true;

    addTests();

    responsiveVoice.AddEventListener("OnLoad",function(){
        console.log("ResponsiveVoice Loaded Callback") ;
    });


    CheckLoading();


    
});

responsiveVoice.OnVoiceReady = function() {



    voiceReady = true;
    CheckLoading();
}


function addTests() {
    
    addTest("TTS Support");
    addTest("Load");
    addTest("Voices");
    
    
}


function CheckLoading() {
    
    if (voiceReady && windowReady) {


        //Populate voice selection dropdown
        var voicelist = responsiveVoice.getVoices();

        testDone('Voices',voicelist.length>0);

        var vselect = $("#voiceselection");
        $.each(voicelist, function() {
                vselect.append($("<option />").val(this.name).text(this.name));
        });

        testDone('Load',true)

        if (window.speechSynthesis) {
            
            testDone('TTS Support',true )
        }else{
            if (responsiveVoice.fallbackMode)
                testDone('TTS Support',true,"Fallback Mode Enabled" );
            else
                testDone('TTS Support',false,"No support" );
        }
        
        
        
    }
    
}



function test1() {
    responsiveVoice.speak("This is a short text",$('#voiceselection').val());
}
function test2() {
    responsiveVoice.speak("Human spoken language makes use of the ability of almost all persons in a given society to dynamically modulate certain parameters of the laryngeal voice source in a consistent manner. The most important communicative, or phonetic, parameters are the voice pitch (determined by the vibratory frequency of the vocal folds) and the degree of separation of the vocal folds, referred to as vocal fold adduction (coming together) or abduction (separating).",$('#voiceselection').val());
}
function stopvoice() {
    responsiveVoice.cancel();
}
function test3(p) {
    responsiveVoice.speak("This is a short text",$('#voiceselection').val(),{pitch:p});
}
function test4(p) {
    responsiveVoice.speak("This is a short text",$('#voiceselection').val(),{rate:p});
}
function test5() {
    responsiveVoice.speak("This is a short text",$('#voiceselection').val(),{volume:0.25});
}

</script>

</head>

<body>
    
    
    
        <h1> ResponsiveVoice TestRun </h1>

<!--    <a class="rvbuilds" href="testrun.php?rv=responsivevoice.js">Latest minified</a>            
    <a class="rvbuilds" href="testrun.php?rv=responsivevoice.src.js">Latest src</a>            -->
<?php
    $files = array_slice(scandir(dirname(__FILE__) . "/../"), 2);       
    
     $blacklist = array('.', '..', '.git', '.gitignore', 'changelog.txt', 'examples',  'nbproject',  'getvoice.php');
    foreach($files as $f) {
        
        if (!in_array($f, $blacklist)) {
        
        $spclass = "";
        if ($f == $rvfile) {
            $spclass="rvbuildselected";
        }
        $path = $f . "/responsivevoice.js";
        if (strstr($f,'responsivevoice')) {
            $path = $f;
           
        }else{
            //die($rvfile);
            $tst = $rvfile;
            $tst = str_replace("/responsivevoice.js","",$tst);
            
             if  ( $tst==$f) {
                
                $spclass="rvbuildselected";
            }           
        }
        
        ?>
       
        <a class="rvbuilds <?=$spclass?>" href="testrun.php?rv=<?=$path?>"><?=$f?></a>
        <?
        
        }
    }



?><br/>
        <br/>
        <div id="tests"></div>
        <br/>
            <select id="voiceselection"></select>
            <br/><br/>
        <button class="" onclick="stopvoice();">Stop voice</button><br/>
        <button class="buttonc" onclick="test1();">Short text</button><br/>
        <button class="buttonc" onclick="test2();">Long text</button><br/>
        <button class="buttonc" onclick="test3(2);">High Pitch</button><button class="buttonc" onclick="test3(0.25);">Low Pitch</button><br/>
        <button class="buttonc" onclick="test4(1.5);">High Rate</button><button class="buttonc" onclick="test4(0.25);">Low Rate</button><br/>
        <button class="buttonc" onclick="test5();">Low Volume</button><br/>
        
        

    
    
    
    
    
</body>
</html>
