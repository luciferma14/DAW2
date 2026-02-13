def detect_offensive(message):
    offensive_words = ['insulto1','insulto2']
    for word in offensive_words:
        if word.lower() in message.lower():
            return True
    return False
