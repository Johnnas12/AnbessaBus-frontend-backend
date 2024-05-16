import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:furomapp/controllers/authentication.dart';
import 'package:furomapp/controllers/localeProvider.dart';
import 'package:furomapp/controllers/ticket.dart';
import 'package:furomapp/controllers/ticketrefresh.dart';
import 'package:furomapp/l10n/l10n.dart';
import 'package:furomapp/views/about_us.dart';
import 'package:furomapp/views/login_page.dart';
import 'package:furomapp/views/lost_and_found.dart';
import 'package:furomapp/views/search_page.dart';
import 'package:furomapp/views/services.dart';
import 'package:furomapp/views/terms.dart';
import 'package:furomapp/views/testInput.dart';
import 'package:furomapp/views/widgets/bottom_navigator.dart';
import 'package:furomapp/views/widgets/input_widget.dart';
import 'package:furomapp/views/widgets/map_view.dart';
import 'package:furomapp/views/widgets/qr_widget.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:furomapp/controllers/search.dart';
import 'package:furomapp/views/profile.dart';
import 'package:intl/intl.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:loading_animation_widget/loading_animation_widget.dart';
import 'package:flutter_gen/gen_l10n/app_localizations.dart';


class HomePage extends StatefulWidget {
  const HomePage({super.key});
  
  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final TextEditingController _startingController = TextEditingController();
  final TextEditingController _destinationController = TextEditingController();
  final  TicketRefresh _ticketRefresh = Get.put(TicketRefresh());
  final AuthenticationController _authenticationController = Get.put(AuthenticationController());
  //SharedPreferences prefs = await SharedPreferences.getInstance();
 // final userData = GetStorage().read('user');
  //final userData = GetStorage().read('user') as Map<dynamic, dynamic>;
  final box = GetStorage();
  //final SearchController _searchController = Get.put(SearchController());
  int _currentIndex = 0;
  late final LocaleProvider provider = LocaleProvider();
  List<String> sefer  = <String> ['Kera', "Semen Addisu Gebeya"];

  void _onTap(int index) {
    setState(() {
      _currentIndex = index;
    });
  }

    void _openSearchPopup(TextEditingController controller) async {
    final result = await Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => FullscreenSearchPopup(
          onSelect: (value) {
            controller.text = value;
          },
        ),
      ),
    );
  }

  final SearchResultController _searchResultController =
      Get.put(SearchResultController());

  @override
  Widget build(BuildContext context) {
    var userdata =  box.read('user');
    var tickets = box.read('tickets');
    //var tickets = _ticketRefresh.getDataList();

      
    //SharedPreferences prefs = await SharedPreferences.getInstance();
    //String? tickets = prefs.getString('tickets');
    //var user = jsonDecode(userdata);

    return Scaffold(
      body: _searchResultController.isLoading.value ? Center(
      child : LoadingAnimationWidget.staggeredDotsWave(
        color: Colors.white,
        size: 200,
      )) : _currentIndex == 0
          ? SingleChildScrollView(
              child: Container(
                //backgroundColor: ,

                child: Column(
                  children: [
                    Container(
                      decoration: BoxDecoration(
                          borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(50.0),
                            bottomRight: Radius.circular(50.0),
                          ),
                          color: Color(0xFFF36D44)),
                      // color: Color(0xFFF36D44),
                      height: 350,
                      child: Column(
                        children: [
                          Container(
                            margin:
                                EdgeInsets.only(left: 20, right: 20, top: 30),
                            child: Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                SizedBox(
                                  width: 30,
                                ),
                                
                                  Text(
                                    AppLocalizations.of(context)!.anbessa,
                                    softWrap: true,
                                    style: GoogleFonts.poppins(
                                        fontSize: 32, color: Color(0xFFFFE606)),
                                  ),
                               
                                 DropdownButton<Locale>(
              iconEnabledColor: Colors.white,
              dropdownColor: Color.fromARGB(195, 239, 126, 20),
              onChanged: (d){
            
              },
            
             
            
             //value: provider.locale?? const Locale("am"),
            
              items:  L10n.all.map<DropdownMenuItem<Locale>>((value) {
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
                            ),
                          ),

                            ClipRRect(
                          borderRadius: BorderRadius.circular(60.0), // Adjust the radius as needed
                          child:Image(
                            image: AssetImage('assets/img/logo.jpg'),
                            height: 200,
                          ),
                          
                          
                          )
                          
                        ],
                      ),
                    ),
                    Container(
                      transform: Matrix4.translationValues(0.0, -50.0, 0.0),
                      height: 280.0,
                      width: 360.0,
                      decoration: BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.circular(20.0),
                        boxShadow: [
                          BoxShadow(
                            color: Colors.black.withOpacity(0.2),
                            spreadRadius: 5,
                            blurRadius: 10,
                            offset: Offset(0, 3),
                          ),
                        ],
                      ),

                     child: Padding(
                        padding: const EdgeInsets.all(20.0),
                      child: Column(
  
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: [
                              TextField(
                              
                            controller: _startingController,
                            readOnly: true,
                            onTap: () => _openSearchPopup(_startingController),
                            decoration: InputDecoration(
                                    hintText: AppLocalizations.of(context)!.start, 
                                    prefixIcon: Icon(Icons.flight, color: const Color(0xFFF36D44), size: 40,),
                                 border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                  borderSide: BorderSide(color: Colors.grey),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                ), 
                                    ),
                            
                          ),
                          SizedBox(height: 20),
                          TextField(
                            controller: _destinationController,
                            readOnly: true,
                            onTap: () => _openSearchPopup(_destinationController),
                             decoration: InputDecoration(
                                    hintText: AppLocalizations.of(context)!.departure, 
                                    prefixIcon: Icon(Icons.location_on, color: const Color(0xFFF36D44), size: 40,),
                                 border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                  borderSide: BorderSide(color: const Color.fromARGB(255, 140, 102, 102)),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                ), 
                                    ),
          ),
                        ],
                      ),
                    ), 
                      // child: Padding(
                      //   padding: const EdgeInsets.all(20.0),
                      //   child: Column(
                      //     mainAxisAlignment: MainAxisAlignment.center,
                      //     children: [
                      //       Row(
                      //         mainAxisAlignment: MainAxisAlignment.center,
                      //         children: [
                                // Icon(
                                //   Icons.flight,
                                //   size: 30.0,
                                //   color: Color(0xFFFFE606),
                                // ),
                                // SizedBox(width: 10.0),

                                // Flexible(
                                //   child: Autocomplete <String>(  
                                //     optionsBuilder: (TextEditingValue start){
                                //       return sefer.where((String value) => value.toLowerCase().startsWith(start.text.toLowerCase()));
                                //     },
                                //     onSelected: (String startingpoint){
                                      
                                //     },
                                //         fieldViewBuilder: (BuildContext context, TextEditingController textEditingController, FocusNode focusNode, VoidCallback onFieldSubmitted) {
                                //           return TextField(
                                //             controller: _startingController,
                                //             focusNode: focusNode,
                                //             decoration: InputDecoration(
                                //              // hintText: ,
                                //               labelText: AppLocalizations.of(context)!.start, 
                                //               labelStyle: TextStyle(
                                //            color: Colors.grey, fontSize: 20),
                                //             ),
                                //           );
                                //         },
                                //   )
                                //  )
                                // Flexible(
                                //   child: TextFormField(
                                //     controller: _startingController,
                                //     decoration: InputDecoration(
                                //         border: UnderlineInputBorder(
                                //             borderSide:
                                //                 BorderSide(color: Colors.grey)),
                                //         focusedBorder: UnderlineInputBorder(
                                //           borderSide: BorderSide(
                                //               color: Colors
                                //                   .grey), // Focused bottom border color
                                //         ),
                                //         labelText: AppLocalizations.of(context)!.start,
                                //         labelStyle: TextStyle(
                                //             color: Colors.grey, fontSize: 20)),
                                //   ),
                                // ),
                            //   ],
                            // ),
                            // Row(
                            //   mainAxisAlignment: MainAxisAlignment.center,
                            //   children: [
                            //     Icon(
                            //       Icons.location_on,
                            //       size: 30.0,
                            //       color: Color(0xFFFFE606),
                            //     ),
                            //     SizedBox(width: 10.0),
                            //     Flexible(
                            //       child: TextFormField(
                            //         controller: _destinationController,
                            //         decoration:  InputDecoration(
                            //             border: UnderlineInputBorder(
                            //                 borderSide:
                            //                     BorderSide(color: Colors.grey)),
                            //             focusedBorder: UnderlineInputBorder(
                            //               borderSide: BorderSide(
                            //                   color: Colors
                            //                       .grey), // Focused bottom border color
                            //             ),
                            //             labelText: AppLocalizations.of(context)!.departure,
                            //             labelStyle: TextStyle(
                            //                 color: Colors.grey, fontSize: 20)),
                            //       ),
                            //     ),
                      //       Flexible(
                      //       child:
                      //       TextField(
                      //         controller: _startingController,
                      //         readOnly: true,
                      //         onTap: () => _openSearchPopup(_startingController),
                      //         decoration: InputDecoration(
                      //                 hintText: 'Tap to search', 
                      //                 prefixIcon: Icon(Icons.flight, color: Color(0xFFFFE606),),
                      //                 ),
                              
                      //       ),
                      //       ),
                      //     SizedBox(height: 20),
                      //     TextField(
                      //       controller: _destinationController,
                      //       readOnly: true,
                      //       onTap: () => _openSearchPopup(_destinationController),
                      //       decoration: InputDecoration(hintText: 'Tap to search'),
                      //     ),



                      //       ],
                      //       ),
                      //     ],
                      //   ),
                      // ),
                    ),
                    Container(
                      height: 50,
                      width: 372,
                      decoration: BoxDecoration(
                        color: Color(0xFFF36D44), // Custom color F36D44
                        borderRadius: BorderRadius.circular(25),
                      ),
                      child: 
                  
                      
                      TextButton(
                        onPressed: () async {
                          //Get.to(Suggest());
                          await _searchResultController.SearchResult(
                              from: _startingController.text.trim(),
                              to: _destinationController.text.trim()); 
                        },
                        child:
                             Obx( () {
                     return _searchResultController.isLoading.value
                     ? const CircularProgressIndicator(color: Colors.white,)
                     : 
                         Text(
                          AppLocalizations.of(context)!.search,
                          style: TextStyle(
                            color: Colors.white,
                            fontSize: 18,
                          ),
                           );
                       }
                        ),
                     
                    )
                    ),
                  ],
                ),
              ),
            )

          : _currentIndex == 1
              ? Padding(
                  padding: const EdgeInsets.only(left: 10, right: 10, top: 30),
                  child: Container(
                      child: Column(children: [
                    Container(
                      width: 399,
                      height: 56,
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.circular(25),
                        boxShadow: [
                          BoxShadow(
                            color: Colors.grey.withOpacity(0.5),
                            spreadRadius: 5,
                            blurRadius: 7,
                            offset: Offset(0, 3), // changes position of shadow
                          ),
                        ],
                        color: Color(0xFFF36D44),
                      ),
                      padding: EdgeInsets.symmetric(horizontal: 16),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          // IconButton(
                          //   icon: Icon(Icons.arrow_back),
                          //   onPressed:
                          //   (){Get.to(()=> const HomePage());} // Navigate back when back button is pressed
                          //   ,
                          // ),
                          SizedBox(
                            width: 32,
                          ),
                          Text(
                             AppLocalizations.of(context)!.anbessa,
                            style: GoogleFonts.poppins(
                                fontSize: 26,
                                color: Color.fromARGB(201, 243, 223, 45)),
                          ),
                          Icon(Icons.language,
                              color: Color.fromARGB(201, 243, 223,
                                  45)), // Your "search result" localization icon
                        ],
                      ),
                    ),
                    SizedBox(
                      height: 30,
                    ),
                    Container(
                      child: Image(
                        image: AssetImage('assets/img/logo.jpg'),
                        height: 200,
                      ),
                    ),
                    Container(
                        height: 300.0,
                        width: 360.0,
                        decoration: BoxDecoration(
                          color: Colors.white,
                          borderRadius: BorderRadius.circular(20.0),
                          boxShadow: [
                            BoxShadow(
                              color: Colors.black.withOpacity(0.2),
                              spreadRadius: 5,
                              blurRadius: 10,
                              offset: Offset(0, 3),
                            ),
                          ],
                        ),
                        child: Column(
                          children: [
                            Row(
                              children: [
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.info), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        Get.to(AboutUsPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      AppLocalizations.of(context)!.about, // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.help), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        Get.to(LostAndFoundPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      AppLocalizations.of(context)!.report, // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.description), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        Get.to(TermsPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      AppLocalizations.of(context)!.terms, // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                )
                              ],
                            ), 

                            Row(
                              children: [
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.edit_off_outlined), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        Get.to(ServicesPage());
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      AppLocalizations.of(context)!.services, // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.developer_mode), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        print(tickets);
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      AppLocalizations.of(context)!.developers, // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                ), 
                                Column(
                                  children: [
                                    IconButton(
                                      color: Color(0xFFF36D44),
                                      icon: Icon(Icons.update), // Replace with your desired icon
                                      iconSize:
                                          100.0, // Adjust the size of the icon as needed
                                      onPressed: () {
                                        // Add your onPressed action here
                                        print('Icon clicked!');
                                      },
                                    ),
                                    //SizedBox(height: 4.0), // Add some space between the icon and text
                                    Text(
                                      AppLocalizations.of(context)!.version, // Replace with your desired text
                                      style: TextStyle(
                                        fontSize:
                                            18.0, // Adjust the font size as needed
                                      ),
                                    ),
                                  ],
                                )
                              ],
                            )
                          ],
                        )
                        ),
 
                  ])))
              : _currentIndex == 2
                  ? Padding(
                    padding: const EdgeInsets.all(15.0),
                    child: Container(

                      child: Column(
                        children: [
                          SizedBox(height: 25.0,),
                                    Container(
                                    width: 399,
                                    height: 56,
                                    decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(25),
                    boxShadow: [
                      BoxShadow(
                        color: Colors.grey.withOpacity(0.5),
                        spreadRadius: 5,
                        blurRadius: 7,
                        offset: Offset(0, 3), // changes position of shadow
                      ),
                    ],
                    color: Colors.white,
                                    ),
                    padding: EdgeInsets.symmetric(horizontal: 16),
                    child: Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      SizedBox(width: 120,),
                       Text(
                         AppLocalizations.of(context)!.ticket,
                        style: GoogleFonts.poppins(fontSize: 26, color: Colors.black) ,
                      ), 
                      SizedBox(width: 90,),
                      IconButton(onPressed:  ()async{
                        await _ticketRefresh.ticketRefresh(id: userdata['id']);
                        tickets = (GetStorage().read('tickets'));
                        print(tickets);
                      }, 
                      icon:Icon(Icons.refresh) )
                    ],
                   ),
                  ),
                  SizedBox(height: 25,),
                 // Center(
                  Container(
                    child: GetBuilder <TicketRefresh>(
                      builder: (_ticketRefresh) {
                      //final tickets = _ticketRefresh.getDataList();
                      return  Container (
                         height: 600,
                          child: ListView.builder(
                          itemCount: tickets.length,
                          itemBuilder: (context, index) {
                            var ticket = tickets[index];
                            return Container(
                            height: 300,
                            width: 400,
                            margin: EdgeInsets.only(bottom: 20),
                            decoration : BoxDecoration(
                            color: Color(0xFFF36D44),
                            borderRadius: BorderRadius.circular(25.0),
                            boxShadow: [
                              BoxShadow(
                                color: Colors.black.withOpacity(0.2),
                                spreadRadius: 5,
                                blurRadius: 10,
                                offset: Offset(0, 3),
                              )
                            ],  
                            ), 
                            child: Padding(
                              padding: const EdgeInsets.all(8.0),
                              child: Column(
                                children: [
                                  Text(
                                    "${ticket['from']} - ${ticket['to']}", 
                                    style: GoogleFonts.poppins(fontSize: 30, fontWeight: FontWeight.bold,),
                                  ), 
                                  Text(
                                    "Ticket ID - ${ticket['ticketID']} " ,
                                    style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                  ), 
                                   Text(
                                    'Date: ${ DateFormat('yyyy-MM-dd').format(DateTime.parse(ticket['created_at']))}' ,
                                    style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                  ), 
                                    Text(
                                    "Price- ${ticket['price']}" ,
                                    style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                  ), 
                                    Text(
                                    "Status - ${ticket['status']}" ,
                                    style: GoogleFonts.poppins(fontSize: 20, fontWeight: FontWeight.w500),
                                  ),
                                  QRCodeWidget(status: ticket['status'],)
                                ],
                              ),
                            ),
                          );
                          },
                         
                          ),
                      
                        );
                      }
                    ),
                  ),
                  
                ],
              ),
            ),
          )



          : Padding(
              padding: EdgeInsets.all(20.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  CircleAvatar(
                    radius: 80.0,
                    backgroundImage:
                     AssetImage('assets/img/images.png'),
                       // NetworkImage('https://via.placeholder.com/150'),
                  ),
                  SizedBox(height: 20.0),
                  Text(
                    //userData["user"]["id"],
                  // box.read('user'),
                    userdata['name'],
                    style: TextStyle(
                      fontSize: 24.0,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 10.0),
                  Text(
                    userdata['username'],
                    style: TextStyle(
                      fontSize: 18.0,
                      color: Colors.grey[700],
                    ),
                  ),
                  SizedBox(height: 20.0),
                  Divider(color: Colors.grey),
                  SizedBox(height: 20.0),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Row(
                        children: [
                          Icon(Icons.email, color: Color(0xFFF36D44)),
                          SizedBox(width: 10.0),
                          Text(
                            userdata['email'],
                            style: TextStyle(
                              fontSize: 18,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Icon(Icons.phone, color: Color(0xFFF36D44)),
                          SizedBox(width: 10.0),
                          Text(
                            userdata['phone'],
                            style: TextStyle(
                              fontSize: 18.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                  SizedBox(height: 20.0),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Row(
                        children: [
                          Icon(Icons.location_on, color: Color(0xFFF36D44)),
                          SizedBox(width: 10.0),
                          Text(
                            'Addis Ababa, Ethiopia',
                            style: TextStyle(
                              fontSize: 18.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Icon(Icons.person, color: Color(0xFFF36D44)),
                          SizedBox(width: 10.0),
                          Text(
                            userdata['username'],
                            style: TextStyle(
                              fontSize: 18.0,
                              color: Colors.black,
                            ),
                          ),
                        ],
                      ),
                     
                    ],
                  ),
                  SizedBox(height: 50,), 
                   ElevatedButton(
                       
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color(0xFFF36D44),
                        elevation: 0, 
                        padding: const EdgeInsets.symmetric(horizontal: 50, vertical: 15)
                      ),
                      onPressed:() async {
                        Get.to(LoginPage());
                        //await _authenticationController.logout(context);
    
                      },
                      child: Text('Log out', style: TextStyle(
                        color: Colors.white
                      ),) )
                ],

              ),

              
            ),
     
         bottomNavigationBar: CustomBottomNavigationBar(
        currentIndex: _currentIndex,
        onTap: _onTap,
      ),
  
    );
  }
}



class FullscreenSearchPopup extends StatefulWidget {
  final Function(String) onSelect;

  FullscreenSearchPopup({required this.onSelect});

  @override
  _FullscreenSearchPopupState createState() => _FullscreenSearchPopupState();
}

class _FullscreenSearchPopupState extends State<FullscreenSearchPopup> {
  List<String> _suggestions = ['Kera', 'Semen Addisu Gebeya', 'Kaliti', 'Merkato', 'Megenagna', 'Kore Mekanisa', 'Ayertena', 'Kechene', 'Kolfe', 'Gurara', 'keraniyo', 'kusquam', 'Asko', 'Dile Ber', 'Flidoro', 'Summit/codominium/', 'Lamberet', 'Dire Sololia', 'Legehar', 'Asko Sansuzi', 'Addisu Sefer', 'Sululta', 'Hana Mariyame Kotebe', 'Kotebe Gebiriel', 'Germen Square', 'Lebu Musica bet', 'Kara Kore', 'Bole School Medhanialem', 'Kara Alo', 'Eyesus Church', 'Megenesha', 'Legedadi', 'Gergi', 'Yenegew Fire School', 'Bole Mikhael Square', 'Ayat Condominium', 'Betel Hosipital', 'Bole Michael', 'Lafto', 'Saris Abo', 'Kara', 'Alem Bank', 'Deber Zeit', 'Sebeta', '6 Kilo',  'Mekanisa Jemo', 'Torhailoch', 'Philpos Church', 'Kasanchis', 'Hanamariam', 'Piazza' ];
  String _searchTerm = '';

  void _updateSearchTerm(String newTerm) {
    setState(() {
      _searchTerm = newTerm;
    });
  }

  @override
  Widget build(BuildContext context) {
    List<String> _filteredSuggestions = _suggestions
        .where((suggestion) => suggestion.toLowerCase().contains(_searchTerm.toLowerCase()))
        .toList();

    return Scaffold(
      appBar: AppBar(
        title: Text('Search'),
      ),
      body: Column(
        children: <Widget>[
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextField(
              onChanged: _updateSearchTerm,
              decoration: InputDecoration(
                labelText: 'Search',
                border: OutlineInputBorder(),
              ),
            ),
          ),
          Expanded(
            child: ListView.builder(
              itemCount: _filteredSuggestions.length,
              itemBuilder: (context, index) {
                return ListTile(
                  title: Text(_filteredSuggestions[index]),
                  onTap: () {
                    widget.onSelect(_filteredSuggestions[index]);
                    Navigator.pop(context);
                  },
                );
              },
            ),
          ),
        ],
      ),
    );
  }
}

