from TTS.api import TTS
import simpleaudio as sa
import time
import threading
import os
from queue import Queue

# Initialize TTS
tts = TTS(model_name="tts_models/en/ljspeech/tacotron2-DDC", gpu=False)


# Full text
x = """
The scratching started on day three. At first, Sarah thought it was mice in the walls of her new apartment. But as nights passed, the sound grew louder, more deliberate. It always came from directly behind her bed.

She tried to ignore it, but the scratching wormed its way into her dreams. In them, she saw long, pale fingers clawing at wood, leaving deep grooves.

On the seventh night, Sarah woke to silence. Relief washed over her until she noticed a musty smell permeating the room. Her eyes adjusted to the darkness, and she froze.

The wall behind her bed had changed. Where there was once smooth plaster, now stood an ancient wooden door. Deep scratches marred its surface.

As Sarah watched, paralyzed, the doorknob slowly began to turn.

She wanted to scream, to run, but her body wouldn't respond. The door creaked open, revealing an impenetrable darkness beyond.

From the inky void, a rasping voice whispered, "We've been waiting for you, Sarah."

A cold, clammy hand gripped her ankle. Sarah found her voice and screamed as she was dragged into the hungry dark, the door slamming shut behind her.

Would you like me to elaborate on any part of the story or provide any additional details?"""
# Split the text into sentences
sentences = x.split('. ')

# Queue for managing audio files
audio_queue = Queue()

# Function to play audio file
def play_audio():
    while True:
        try:
            filename = audio_queue.get()  # Correctly get items from the queue
            wave_obj = sa.WaveObject.from_wave_file(filename)
            play_obj = wave_obj.play()
            play_obj.wait_done()
        except queue.Empty:
            break  # Exit loop if queue is empty

# Thread for playing audio
play_thread = threading.Thread(target=play_audio, daemon=True)
play_thread.start()

# Process and add sentences to queue
for i, sentence in enumerate(sentences):
    # Add period back to the sentence if it's not the last one
    if i < len(sentences) - 1:
        sentence += '.'

    # Generate audio file
    filename = f"output_{i}.wav"
    tts.tts_to_file(text=sentence, file_path=filename)

    # Add the generated audio file to the queue
    audio_queue.put(filename)

    # Small pause between sentences
    time.sleep(0.1)

print("All sentences have been processed and added to the queue.")