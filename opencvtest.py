# -*- coding: utf-8 -*-
"""
Created on Sun Jul 14 18:41:00 2019

@author: helen
"""

import cv2
import socket


face_cascade = cv2.CascadeClassifier('C:\\Users\\helen.DESKTOP-LTB5VJV\\.conda\\pkgs\\opencv3-3.1.0-py35_0\\Library\\etc\\haarcascades\\haarcascade_frontalface_default.xml')
#nose_cascade = cv2.CascadeClassifier('C:\\Users\\helen.DESKTOP-LTB5VJV\\.conda\\pkgs\\opencv3-3.1.0-py35_0\\Library\\etc\\haarcascades\\haarcascade_mcs_nose.xml')
#profileface_cascade = cv2.CascadeClassifier('C:\\Users\\helen.DESKTOP-LTB5VJV\\.conda\\pkgs\\opencv3-3.1.0-py35_0\\Library\\etc\\haarcascades\\haarcascade_profileface.xml')
cap = cv2.VideoCapture(0)
time =0

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
   
sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1) #reuse tcp
sock.bind(('', 2500))
sock.listen(2)
meg = 'dangerous'
    
while 1:
    ret, frame = cap.read() 
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY) 
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.5, minNeighbors=8,minSize=(30, 30),flags=cv2.CASCADE_SCALE_IMAGE)
    
    (csock, adr) = sock.accept()
    print ("Client Info: ", csock, adr) 
               
    # Draw a rectangle around the faces
    if len(faces)!=0:
        for (x, y, w, h) in faces:
            cv2.rectangle(frame, (x, y), (x+w, y+h), (0, 255, 0), 2)                    
            cv2.putText(frame,"Find"+str(len(faces))+"faces!",(x,y),cv2.FONT_HERSHEY_SIMPLEX,1,(225,225,225),2)
            time=0                 
            
    elif len(faces)==0:
        time+=1
        text='no face'
        cv2.putText(frame,text,(10,frame.shape[0]-5),cv2.FONT_HERSHEY_SIMPLEX,1, (0, 0, 255), 3)    
    if(time>30):
       print("dangerous!!")
       time=0 
       try:               
           csock.send(meg.encode(encoding='utf_8', errors='strict'))
       except socket.error as e:
           break
    # Display the resulting frame    
    csock.close()
    cv2.imshow('Video', frame)       
          
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()