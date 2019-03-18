ResponsiveVoice
========

**`This repository is outdated`**. Please visit [ResponsiveVoice.org](https://responsivevoice.org/) to download the latest version


# THE MOST POPULAR HTML5 TEXT-TO-SPEECH API

Effortlessly add ‘on-the-fly’ text-to-speech to your website, save hours of needlessly creating and editing audio files, using quality computer voices.

### Don’t Clog the Tubes!
HTML5 introduces the Speech API for Speech Synthesis and Speech Recognition.
This is the easiest way to use the spoken word in your app or website.
Speech Synthesis or more commonly known as Text To Speech (TTS) is now available in most modern browsers.
Gone are the days of waiting for Text To Speech engines to render MP3 audio files from text and then download them from servers.
Today the browser can instantly speak text on the client side and with quite reasonable quality.

### Gargling Bagpipes
But there is a problem, each browser and device can have a different set of “Voices”. You can’t be sure of a consistent user experience when it comes to the spoken voice or accent.

If you make a call to the speak API using the default voice it will sound very different on different users devices and browsers. In some cases you won’t even know if the user will get a male or female voice.

Although, you make a direct call to the speak API and choose a specific voice like “Google UK Female”, if a user is browsing on iOS with Safari the voice will not be available.

### Responsive Design for Voice
Taking inspiration from Responsive Web Design we have created responsivevoice.js a library that can easily be included in a web page that allows you to make simple api calls to speak text.

### Responsive Voices
ResponsiveVoice JS defines a selection of smart Voice profiles that know which voice to use for the users device in order to create a consistent experience no matter which browser or device the speech is being spoken on.

By choosing one ResponsiveVoice the closest voice is chosen on

- iOS (Safari & Chrome)
- Android (Chrome, Including across the popular Text To Speech engines Ivona, Acapela, Samsung)
- Windows (Chrome Desktop)
- Mac OSX (Safari & Chrome)

### Smart Chunking
With large blocks of text ResponsiveVoice splits up the text into chunks, with preference given to splitting at the end of sentences. Preference is given to splitting at full stop, question mark, colon or semi-colon after that split is performed by the nearest comma and falling back from that the nearest space between words.

### Quirks
ResponsiveVoice JS also takes care of a number of hindrances from the various implementations of HTML5 Speech API across browsers and operating systems.

- Chrome desktop has a limit on the number of characters it can speak, under the hood ResponsiveVoice JS automatically chunks text into acceptable blocks
- Chrome desktop will not speak unless initialised after page load, ResponsiveVoice JS resolves this
- iOS Safari & Chrome require timing delays between speech API calls, ResponsiveVoice JS resolves this
- iOS TTS can’t be triggered without a direct user interaction, ResponsiveVoice JS resolves this
- Internet Explorer speech rate is slower, ResponsiveVoice JS resolves this
- more…

[ResponsiveVoice site](https://responsivevoice.org/)