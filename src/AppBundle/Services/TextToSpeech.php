<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 14/06/18
 * Time: 14:56
 */

namespace AppBundle\Services;

use Curl\Curl;

class TextToSpeech
{
    /**
     * Génère un fichier mp3 dans le dossier web/audio à partir de $text
     * @param string $text
     * @param string $fileDestination
     * @return bool
     * @throws \ErrorException
     */
    public function generateAudioFile(string $text, string $fileDestination): bool
    {
        $jsonRequest = file_get_contents('audio/json/data.json');
        $jsonRequest = json_decode($jsonRequest);
        $jsonRequest->input->text = $text;
        $data = fopen('audio/json/data.json', 'w+');
        fwrite($data, json_encode($jsonRequest));
        fclose($data);

        $data = file_get_contents('audio/json/data.json');

        $curl = new Curl();
        $curl->setHeader('Content-Type', 'application/json');
        $curl->post('https://texttospeech.googleapis.com/v1beta1/text:synthesize?key=AIzaSyCtbG6YZUuElPKh4pEs6M65SZRpWH0BBp4', $data);

        if ($curl->error) {
            return false;
        }
        else {
            $fileDestination = 'audio/files/' . $fileDestination . '.mp3';
            preg_match('/:\ ".*"/', $curl->response, $stringToDecode);
            $stringToDecode = substr($stringToDecode[0], 3, -1);
            $audioFile = fopen($fileDestination, 'w+');
            fwrite($audioFile, base64_decode($stringToDecode));
            fclose($audioFile);

            return true;
        }
    }
}