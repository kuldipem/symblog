/* 
 * Copyright (C) 2014 KULDIP PIPALIYA <kuldipem@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


/*
 * @param Integer $request_by
 * @param Integer $reuqest_to
 * @returns Boolean TRUE/FALSE
 */
function sendFriendRequest(event,request_by,reuqest_to){
     event.preventDefault();
     $.ajax({
        url: Routing.generate("blogger_friend_friend_sendfriendrequest",{ by_user_id: request_by , to_user_id: reuqest_to }),
        type: "GET",
        dataType: "json",
        success: function(data,status,xhr){
            alert(data);
        }
     });
}