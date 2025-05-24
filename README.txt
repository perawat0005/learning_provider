ไฟล์ Source code Demo การทำ Login ด้วย Provider ID
จะมี 2 folder
1.learning_provider เป็นส่วนของ Fontend
2.service_provider_id เป็น service ที่ใช้เรียก api โดยสามารถนำไฟล์ index ที่อยู่ใน folder นี้ไปว่างไว้ที่ path ที่ลงทะเบียนขอไว้ได้เลย
เช่น ตอนท่านเขียนในเอกสารจะมีข้อที่ให้กรอก redirect_uri ถ้าท่านกรอกเป็น https://hospital.moph.go.th/providerid/ ท่านก็นำไฟลืนี้ไปวางภายใต้ path นี้

ในส่วนของ Fontend จะมีส่วนที่ต้องแก้ไข คือตรง code ปุ่มกดที่เป็น tag <a></a> ให้แก้ในส่วนที่เป็น XXX
และในส่วนของ service ก็แก้ในส่วนของ XXX เช่นกัน

คู่มือการขอข้อมูล provider ผ่าน api

https://docs.google.com/document/d/1oRNVwrCe-StLwCCpKY-LsQzNzZ5qxd1z3m65uAJ3T-E/edit?tab=t.0