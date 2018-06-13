function speech(text) {
    const synth = window.speechSynthesis;
    const voice = synth.getVoices()[6];
    const pitch = 1;
    const rate = 1;

    let utterThis = new SpeechSynthesisUtterance(text);
    utterThis.pitch = pitch;
    utterThis.rate = rate;
    synth.speak(utterThis);
}

window.speech = speech;