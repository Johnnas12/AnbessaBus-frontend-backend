import 'dart:ffi';
import 'package:flutter/material.dart';
import 'package:furomapp/controllers/authentication.dart';
import 'package:furomapp/views/login_page.dart';
import 'package:furomapp/views/widgets/input_widget.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:flutter_gen/gen_l10n/app_localizations.dart';
import 'package:get/get.dart';

class RegisterPage extends StatefulWidget {
  const RegisterPage({super.key});

  @override
  State<RegisterPage> createState() => _RegisterPageState();
}

class _RegisterPageState extends State<RegisterPage> {

  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _phoneController = TextEditingController();
  final TextEditingController _usernameController = TextEditingController();
  final String _type = '5';
  final AuthenticationController _authenticationController =Get.put(AuthenticationController()); 

  @override
  Widget build(BuildContext context) {
    var size = MediaQuery.of(context).size.width;
    return  Scaffold(
      body: SingleChildScrollView(
        child: Center(
          child: Padding(
            //padding: const EdgeInsets.symmetric(horizontal:30.0),
            padding: const EdgeInsets.only(top: 80,right: 30, left: 30),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Text(AppLocalizations.of(context)!.register, style: GoogleFonts.poppins(fontSize: size * 0.070)), 
                 const SizedBox(height: 20,), 
                InputWidget(
                  hintText:AppLocalizations.of(context)!.name, 
                  obsecureText: false,
                  controller: _nameController
                  ,), 
                 const SizedBox(height: 20,), 
                InputWidget(
                  hintText: AppLocalizations.of(context)!.username, 
                  obsecureText: false,
                  controller: _usernameController
                  ,), 
                const SizedBox(height: 20,), 
                InputWidget(
                  hintText: AppLocalizations.of(context)!.email, 
                  obsecureText: false,
                  controller: _emailController
                  ,), 
                const SizedBox(height: 20,), 
                 InputWidget(
                  hintText: AppLocalizations.of(context)!.phone, 
                  obsecureText: false,
                  controller: _phoneController
                  ,), 
                const SizedBox(height: 20,),
                InputWidget(
                  hintText: AppLocalizations.of(context)!.password,
                  obsecureText: true,
                  controller: _passwordController,
                ), 
                 const SizedBox(height: 20,), 
                 Obx(() {
                     return _authenticationController.isLoading.value
                     ? const CircularProgressIndicator()
                     :ElevatedButton(    
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color(0xFFF36D44),
                        elevation: 0, 
                        padding: const EdgeInsets.symmetric(horizontal: 50, vertical: 15)
                      )        
                   ,
                      onPressed: () async{
                        await _authenticationController.registerUser(
                          name : _nameController.text.trim(), 
                          password: _passwordController.text.trim(), 
                          email: _emailController.text.trim(), 
                          username: _usernameController.text.trim(), 
                          phone: _phoneController.text.trim(),
                          type : _type.trim()
                          );
                      },
                      child:  Text(AppLocalizations.of(context)!.registerbtn, style: TextStyle(
                        color: Colors.white
                      ),) );
                   }
                 ),
            
                 const SizedBox(height: 20,), 
                  TextButton(onPressed: (){ Get.to(()=> const LoginPage());}, child: Text(
                   AppLocalizations.of(context)!.backtologin, style: GoogleFonts.poppins(fontSize: size * 0.040)
                  )), 
              ],
            ),
          ),
        ),
      ),
    );
  }
}
