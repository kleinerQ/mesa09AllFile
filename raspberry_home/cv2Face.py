import cv2
cv2.namedWindow("Mypicture1")
img1 = cv2.imread("1.jpg")
cv2.imshow("Mypicture1",img1)
cv2.waitKey(3000)


face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
faces = face_cascade.detectMultiScale(img1,1.2, 2)
print('A')
cv2.rectangle(img1, (img1.shape[1]-140,img1.shape[0]-20),(img1.shape[1],img1.shape[0]),(0,255,255),-1)
print('B')
cv2.putText(img1,"Finding" + str(len(faces)) + "face", (img1.shape[1]-135,img1.shape[0]-5), cv2.FONT_HERSHEY_COMPLEX,0.5, (255,0,0),1)

cv2.namedWindow("Mypicture1")
print(faces)
for (x,y,w,h) in faces:
    print(x)
    cv2.rectangle(img1,(x,y),(x+w,y+h),(255,0,0),2)
cv2.namedWindow("Face", cv2.WINDOW_NORMAL)
cv2.imshow("Face", img1)
cv2.waitKey(30000)
