const express = require("express");
const path = require("path");
const app = express();
const port = 5000;
const upload = require("express-fileupload");
app.use(upload());
//bulitin middleware
app.use(express.static(path.join(__dirname,'./main')));
app.get("/",function(req,res){
    res.sendFile(__dirname+"./main/index.html");
})
// app.get("/",(req,res)=>{
// //    res.send("sdknklf") 
// })
app.post("/",function(req,res){
    if(req.files){
        var file = req.files.Select_file;
        var filename = file.name;
        file.mv("./upload/"+filename,function(err){
            if(err){
                console.log(err);
                res.send("error occured");
                
            }else{
                res.send("<h1>file uploaded</h1>");
            }
        })
    }
})

app.listen(port, ()=>{
    console.log(`listening to the port ${port}`);
    
})