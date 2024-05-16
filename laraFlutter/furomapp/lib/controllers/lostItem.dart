import 'package:flutter/material.dart';
import 'package:furomapp/views/home.dart';
//import 'package:furomapp/constants/constants.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:get_storage/get_storage.dart';
class LostItemController extends GetxController{

Future<String?> saveLost({ required String category, required String decsription}) async {
  final box = GetStorage();
  var userData = box.read('user');
  try{
      var url = Uri.parse('http://192.168.153.1:81/api/report');
        var response = await http.post(
          url,
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
             },
          body: jsonEncode({
            'passenger': userData['name'],
            'category': category,
            'decsription': decsription,
            'contactInfo' : userData['phone'],
          }),
        );

         print('Response status code: ${response.statusCode}');
         print('Response body: ${response.body}');


        if (response.statusCode == 200) {
          var responseData = jsonDecode(response.body);
         // var token1 = responseData['token'];
       
          
          // Get.offAll(() => const HomePage());
           Get.snackbar(
            'Success',
            responseData['message'],
            snackPosition: SnackPosition.TOP,
            backgroundColor: Colors.green,
            colorText: Colors.white,
          );
        } else {
          
      var responseData = json.decode(response.body);
      
      Get.snackbar(
        'Error',
        responseData['message'],
        snackPosition: SnackPosition.TOP,
        backgroundColor: Colors.red,
        colorText: Colors.white,
      );

      }

        } catch (e){
     
        print(e.toString());
        }
      }


}