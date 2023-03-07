const app = require('./app.js');
const dotEnv = require('dotenv');

const PORT = process.env.PORT || 4000;

// Environment variable file
dotEnv.config({path:'./config/config.js'});

app.listen(PORT,()=>{
    console.log(`Server listening on PORT => ${PORT}`);
});