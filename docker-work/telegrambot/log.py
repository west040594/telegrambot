def log(message,answer):
    print("\n -----")
    from datetime import datetime
    print(datetime.now())

    print("Сообщение от {0} {1} (id = {2})\nТекст - {3}".format(message.from_user.first_name,
                                                        message.from_user.last_name,
                                                        str(message.from_user.id),
                                                        message.text))
    print("Ответ - {0}".format(answer))