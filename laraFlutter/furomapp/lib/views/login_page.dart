import 'package:flutter/material.dart';
import 'package:furomapp/controllers/localeProvider.dart';
import 'package:furomapp/l10n/l10n.dart';
import 'package:furomapp/main.dart';
import 'package:furomapp/views/register_page.dart';
import 'package:furomapp/controllers/authentication.dart';
import 'package:furomapp/views/splash_screen.dart';
import 'package:furomapp/views/widgets/input_widget.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:get/get.dart';
import 'package:flutter_gen/gen_l10n/app_localizations.dart';
import 'package:provider/provider.dart';
class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {

  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final AuthenticationController _authenticationController =Get.put(AuthenticationController());
  Locale _currentLocale = const Locale('en');
  late final LocaleProvider provider = LocaleProvider();




  

  @override
  Widget build(BuildContext context) {
    var size = MediaQuery.of(context).size.width;
    return  Scaffold(
      body:
      SingleChildScrollView(
        child:  Center(
        child: Padding(
          padding: const EdgeInsets.symmetric(horizontal:0), //30.0
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              
              Container(
            decoration: BoxDecoration(
                boxShadow: [
                  BoxShadow(
                     color: Color.fromARGB(255, 1, 1, 1).withOpacity(0.2),
                      spreadRadius: 5,
                      blurRadius: 20,
                      offset: Offset(0, 6), 
                  )
                ],
                borderRadius: BorderRadius.only(
                  bottomLeft: Radius.circular(20.0),
                  bottomRight: Radius.circular(180.0),
                  
                ),
                color: Color(0xFFF36D44)),
            // color: Color(0xFFF36D44),
            height: 440,
            child: Padding(
              padding: const EdgeInsets.all(10.0),
              child: Column(

                children: [
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Row(
                            mainAxisAlignment: MainAxisAlignment.spaceBetween,
                            children: [
                              SizedBox(
                                width: 10,
                              ),
                              Text(
                                "",
                                style: GoogleFonts.poppins(
                                    fontSize: 32, color: Color(0xFFFFE606)),
                              ),
                    
                                  
                                  DropdownButtonHideUnderline(
                                          child: Row(
                                            children: [
                                              Icon(
                                              Icons.language, 
                                              color: Color(0xFFFFE606),
                                            ),
                                              DropdownButton<Locale>(
                                                iconEnabledColor: Colors.white,
                                                dropdownColor: Color.fromARGB(195, 239, 126, 20),
                                                onChanged: (d){
                                              
                                                },
                                              
                                 
                                
                                 //value: provider.locale?? const Locale("am"),
                                
                                  items: L10n.all.map<DropdownMenuItem<Locale>>((value) {
                                    return DropdownMenuItem<Locale>(
                    value: value,
                    child: Text(value.toString(),
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: (){
                      final provider =
                      Provider.of<LocaleProvider>(context, listen: false);
                      provider.setLocale(value);
                    },
                                    );
                                  }).toList(),
                                ),
                              ],
                            )
                    )
                    
                                  // GestureDetector(
                                  //     onTap: () {
                                  //       showDialog(
                                  //         context: context,
                                  //         builder: (BuildContext context) {
                                  //           return AlertDialog(
                                  //             title: Text('Select Language'),
                                  //             content: Column(
                                  //               mainAxisSize: MainAxisSize.min,
                                  //               children: [
                                  //                 ListTile(
                                  //                   title: Text('English'),
                                  //                   onTap: () {
                                  //                     // Handle selection of English language
                                  //                      // MyApp.of(context).setLocale(Locale.fromSubtags(languageCode: 'en'));
                                                       
                                  //                     // _changeLanguage(const Locale('en'));
                                  //                     Navigator.pop(context); // Close the dialog
                                  //                   },
                                  //                 ),
                                  //                 ListTile(
                                  //                   title: Text('Ahmaric'),
                                  //                   onTap: () {
                                  //                     // Handle selection of Spanish language
                                  //                     //MyApp                                                     
                                  //                     //_changeLanguage(const Locale('am'));
                                                      
                                  //                     Navigator.pop(context); // Close the dialog
                                  //                   },
                                  //                 ),
                                  //                  ListTile(
                                  //                   title: Text('Afaan Oromoo'),
                                  //                   onTap: () {
                                  //                     // Handle selection of Spanish language
                                  //                     //_changeLanguage(const Locale('or'));
                    
                                  //                     Navigator.pop(context); // Close the dialog
                                  //                   },
                                  //                 ),
                                  //                 // Add more language options as needed
                                  //               ],
                                  //             ),
                                  //           );
                                  //         },
                                  //       );
                                  //     },
                                  //     child: Icon(
                                  //       Icons.language,
                                  //       color: Color(0xFFFFE606),
                                  //     ),
                                  //   ),
                    
                                ]    
                    ),
                  ),
                  
                 
                  SizedBox(height: 25,), 
                  ClipRRect(
                          borderRadius: BorderRadius.circular(60.0), // Adjust the radius as needed
                          child: Image.asset(
                            'assets/img/logo.jpg',
                            width: 200, // Adjust width as needed
                            height: 200, // Adjust height as needed
                            fit: BoxFit.cover,
                          ),
                        ), 
                  // Container(
                  //   decoration: BoxDecoration(
                  //     borderRadius: BorderRadius.circular(25),
                  //   ),
                  //   child: Image(
                  //   image: AssetImage(''),
                  //   height: 200,
                  // ),
                  // ), 
                   
                Text(AppLocalizations.of(context)!.welcome, style: GoogleFonts.poppins(fontSize: size * 0.070, color: Color(0xFFFFE606), fontWeight: FontWeight.w500)), 
                const SizedBox(height: 30,), 
                ],
              ),
            ), 
            ),
            SizedBox(height: 30,),
             Padding(
               padding: const EdgeInsets.symmetric(horizontal:30.0),
               child: Container(
                child: Column(
                  children: [
                  InputWidget(
                  hintText: AppLocalizations.of(context)!.email, 
                  obsecureText: false,
                  controller: _emailController
                  ,), 
                const SizedBox(height: 30,), 
                InputWidget(
                  hintText: AppLocalizations.of(context)!.password,
                  obsecureText: true,
                  controller: _passwordController,
                ), 
                 const SizedBox(height: 30,), 
                  Obx( () {
                     return _authenticationController.isLoading.value
                     ? const CircularProgressIndicator()
                     : ElevatedButton(
                       
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color(0xFFF36D44),
                        elevation: 0, 
                        padding: const EdgeInsets.symmetric(horizontal: 50, vertical: 15)
                      ),
                      onPressed:() async {
                            await _authenticationController.loginUser(
                              email: _emailController.text.trim(), 
                              password: _passwordController.text.trim());
                      },
                      child: Text(AppLocalizations.of(context)!.login, style: TextStyle(
                        color: Colors.white
                      ),) );
                    }
                  ), 
               
                  const SizedBox(height: 20,), 
                  Text(AppLocalizations.of(context)!.tryourservices, style: GoogleFonts.poppins(fontSize: size * 0.040)), 
                  TextButton(onPressed: (){ Get.to(()=> const RegisterPage());}, child: Text(
                    AppLocalizations.of(context)!.here, style: GoogleFonts.poppins(fontSize: size * 0.030)
                  )), 

         
                  ],
                ),
               ),
             )
              
            ],
          ),
        ),
      ),
        
      )
      
    );
  }
}
