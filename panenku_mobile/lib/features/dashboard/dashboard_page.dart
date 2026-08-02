import 'package:flutter/material.dart';

import '../../data/models/user_model.dart';
import '../../data/repositories/profile_repository.dart';

class DashboardPage extends StatefulWidget {
  const DashboardPage({super.key});

  @override
  State<DashboardPage> createState()=>_DashboardPageState();
}

class _DashboardPageState extends State<DashboardPage>{

  UserModel? user;
  bool loading=true;

  @override
  void initState(){
    super.initState();
    loadProfile();
  }

  Future<void> loadProfile() async{

    try{

      final result=await ProfileRepository().getProfile();

      setState((){

        user=result;
        loading=false;

      });

    }catch(e){

      debugPrint(e.toString());

      setState(()=>loading=false);

    }

  }


  @override
  Widget build(BuildContext context){

    return Scaffold(
      appBar:AppBar(
        title:const Text("PanenKu"),
      ),

      body:Center(
        child:loading

        ? const CircularProgressIndicator()

        : user==null

        ? const Text("Gagal mengambil data user")

        : Column(
            mainAxisAlignment:MainAxisAlignment.center,
            children:[

              const Text(
                "Selamat datang",
                style:TextStyle(
                  fontSize:22,
                  fontWeight:FontWeight.bold,
                ),
              ),

              const SizedBox(height:10),

              Text(
                user!.email,
                style:const TextStyle(
                  fontSize:18,
                ),
              ),

            ],
          ),
      ),
    );

  }

}