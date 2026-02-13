import re

def detect_spam(message):
    spam_words = ['gratis', 'click', 'suscríbete']
    for word in spam_words:
        if word.lower() in message.lower():
            return True
    return False
