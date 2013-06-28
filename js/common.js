function alert(msg){
  msg = String(msg);
  art.dialog({
    title: '欢迎',
    content: msg,
    time:2000,
  });
}