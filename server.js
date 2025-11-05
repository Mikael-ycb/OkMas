// // server.js
// import express from "express";
// import { createProxyMiddleware } from "http-proxy-middleware";

// const app = express();
// const PORT = process.env.PORT || 3000;

// // Ganti dengan Agent ID Chatbase kamu
// const AGENT_ID = process.env.CHATBASE_AGENT_ID || "your_agent_id_here";


// const chatbaseProxy = createProxyMiddleware({
//   target: `https://www.chatbase.co`,
//   changeOrigin: true,
//   pathRewrite: {
//     [`^/help`]: `/${AGENT_ID}/help`,
//   },
//   proxyTimeout: 5000,
// });

// app.use("/help", chatbaseProxy);

// app.get("/", (req, res) => {
//   res.send("Server Proxy untuk Chatbase siap digunakan.");
// });

// app.listen(PORT, () => {
//   console.log(`✅ Server berjalan di http://localhost:${PORT}`);
// });
