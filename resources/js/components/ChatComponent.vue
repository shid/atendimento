<template>
  <div class="messaging">
    <div class="inbox_msg">

      <div class="mesgs">
        <div class="msg_history" id="history">
          <div v-for="msg in this.history">
            <div class="outgoing_msg" v-if="msg.is_mine">
              <div class="sent_msg">
                <p>{{msg.comments}}</p>
                <span class="time_date">{{msg.created_at}}</span>
              </div>
            </div>
            <div class="incoming_msg" v-else>
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{msg.comments}}</p>
<!--                  <span class="time_date"> 11:01 AM    |    June 9</span>-->
                  <span class="time_date">{{msg.created_at}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="type_msg">
          <div class="input_msg_write">
            <input type="text" class="write_msg" placeholder="Type a message" v-model="message" name="message" />
            <button class="msg_send_btn" type="button" @click="save">
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    name: "ChatComponent",
    mounted() {
      axios.get('/api/comments/' + this.ticket_id + '/show?user_id=' + this.user_id, {}).then(({data}) => {
        this.history = data.data;
      });
      $(document).ready(function(){
        $("#history").scrollTop($("#history")[0].scrollHeight);
      });
    },
    methods: {
      save: function () {
        let data = {
          'user_id': this.user_id,
          'reply_to': this.reply_to,
          'comments': this.message,
          'ticket_id': this.ticket_id
        };
        axios.post('/api/comments/save', data).then(({data}) => {
          this.history = data.data;
          this.message = '';
        });
      }
    },
    data: function(){
      return {
        history: [],
        message: null,
      }
    },
    props: [
      'user_id',
      'reply_to',
      'ticket_id',
    ]
  }
</script>

<style>
  img{
    max-width:100%;
  }

  .inbox_msg {
    /*border: 1px solid #c4c4c4;*/
    clear: both;
    overflow: hidden;
  }

  .incoming_msg_img {
    display: inline-block;
    width: 6%;
  }

  .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
  }

  .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }

  .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
  }

  .received_withd_msg {
    width: 57%;
  }

  .mesgs {
    /*float: left;*/
    /*padding: 30px 15px 0 25px;*/
    /*width: 60%;*/
  }

  .sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
  }

  .outgoing_msg{
    overflow:hidden; margin:26px 0 26px;
  }

  .sent_msg {
    float: right;
    width: 46%;
  }

  .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
  }

  .type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
  }

  .msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
  }

  .msg_history {
    height: 516px;
    overflow-y: auto;
    padding-bottom: 10px;
  }
</style>
